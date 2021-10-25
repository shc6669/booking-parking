<?php

namespace Vanguard\Http\Controllers\Web;

use Vanguard\Http\Requests\Booking\BookingRequest;
use Vanguard\Http\Controllers\Controller;
use Vanguard\MStatus;
use Vanguard\MFares;
use Vanguard\TOrders;
use Vanguard\TOrdersDetail;
use Vanguard\TParkingBay;
use Vanguard\TTransactions;
use Toastr;

class BookingController extends Controller
{
    /**
     * Checking function
     */
    public function checkAvailability($type)
    {
        $statuses = MStatus::pluck('name', 'id');
        $query = TParkingBay::with('bay_status:id,name');

        foreach($statuses as $key => $status)
        {
            if($key == $type)
            {
                $data = $query->whereIn('status', [$type])->get();

                return $data;
            }
            elseif($type == null)
            {
                $data = $query->get();

                return $data;
            }
        }

        return abort(422);
    }

    /**
     * Index Homepage
     */
    public function index()
    {
        $fares  = MFares::get();
        $data = $this->checkAvailability(2);

        $bays = [];

        foreach($data as $value)
        {
            if(empty($value))
            {
                return 'Data not found';
            }
            elseif($value->open_fullday == 1)
            {
                $value->open_fullday = 'Open Fullday';
            }
            else
            {
                $value->open_fullday = 'Non Open Fullday';
            }

            $bays[] = $value;
        }

        return view('booking.index', compact('bays', 'fares'));
    }

    /**
     * Store booking with payment
     */
    public function storePayment(BookingRequest $request)
    {
        $inputs = $request->only(['bay_id', 'card_name', 'card_number', 'fare_id', 'fullname', 'notes']);

        /* Check session */
        if($request->session()->exists('fullname'))
        {
            $check_user = $request->session()->get('fullname');
            if($inputs['fullname'] == $check_user )
            {
                Toastr::info('Information', 'You can only order bay once');

                return redirect()->back();
            }
            else
            {
                $fare = $inputs['fare_id'];
                $price = MFares::where('id', $fare)->first();

                $booked = new TOrders;
                $booked->total_payment  = $price->price;
                $booked->status         = 1;    // 0 = Processing, 1 = Success, 2 = Canceled
                $booked->save();

                if(!empty($booked))
                {
                    $book_detail = new TOrdersDetail;
                    $book_detail->order_id      = $booked->id;
                    $book_detail->bay_id        = $inputs['bay_id'];
                    $book_detail->fare_id       = $fare;
                    $book_detail->fullname      = $inputs['fullname'];
                    $book_detail->starts_at     = now();
                    if(!empty($inputs['notes']))
                    {
                        $book_detail->notes = $inputs['notes'];
                    }
                    $book_detail->save();

                    /* Change bay status */
                    $bay = TParkingBay::find($book_detail->bay_id);
                    $bay->status = 1;
                    $bay->save();

                    /* Use Session to store */
                    $request->session()->put('fullname', $book_detail->fullname);
                }

                if(!empty($book_detail))
                {
                    $transaction = new TTransactions;
                    $transaction->order_id              = $booked->id;
                    $transaction->total_payment         = $booked->total_payment;
                    $transaction->payment_type          = 'Credit Card';
                    $transaction->payment_completed_at  = now();
                    $transaction->card_name             = $inputs['card_name'];
                    $transaction->card_number           = substr($inputs['card_number'], 0, 12).str_repeat('x', 4);
                    $transaction->save();
                }

                Toastr::success('Success', 'Thank you for booking our Bay. Have a nice day.');
                
                return redirect()->back();
            }
        }
    }

    /**
     * Store booking without payment
     */
    public function storeNonPayment(BookingRequest $request)
    {
        /* Check session */
        if($request->session()->has('order_id'))
        {
            return response()->json([
                'message' => "This order has already paid",
            ]);
        }
        else
        {
            $inputs = $request->only(['bay_id', 'card_name', 'card_number', 'fare_id', 'fullname', 'notes']);
            $fare = $inputs['fare_id'];
            $price = MFares::where('id', $fare)->first();

            $booked = new TOrders;
            $booked->total_payment  = $price->price;
            $booked->status         = 0;    // 0 = Processing, 1 = Success, 2 = Canceled
            $booked->save();

            /* Use Session to store */
            $request->session()->put('order_id', $booked->id);

            if(!empty($booked))
            {
                $book_detail = new TOrdersDetail;
                $book_detail->order_id      = $booked->id;
                $book_detail->bay_id        = $inputs['bay_id'];
                $book_detail->fare_id       = $fare;
                $book_detail->fullname      = $inputs['fullname'];
                $book_detail->starts_at     = now();
                if(!empty($inputs['notes']))
                {
                    $book_detail->notes = $inputs['notes'];
                }
                $book_detail->save();

                /* Change bay status */
                $bay = TParkingBay::find($book_detail->bay_id);
                $bay->status = 3;
                $bay->save();
            }

            if(!empty($book_detail))
            {
                $transaction = new TTransactions;
                $transaction->order_id              = $booked->id;
                $transaction->total_payment         = $booked->total_payment;
                $transaction->save();
            }
            
            return response()->json([
                'success'   => true,
                'message'   => "Success created booking, please pay the booking",
                'order_id'  => $booked->id
            ]);
        }
    }
}