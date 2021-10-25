<?php

namespace Vanguard\Http\Controllers\Web;

use Vanguard\Http\Controllers\Controller;
use Vanguard\TOrders;
use Vanguard\TOrdersDetail;
use DataTables;

class TransactionsOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:transactions-orders.manage');
    }

    public function getDataOrders()
    {
        $datas = TOrders::with(['user:id,first_name,last_name', 'restaurant:id,name'])
                    ->latest()
                    ->get();

        $orders = [];
        foreach($datas as $data)
        {
            $orders[]= [
                'id'            => $data->id,
                'fullname'      => $data->user->first_name.' '.$data->user->last_name,
                'total_payment' => 'Rp. '.$data->total_payment,
                'status'        => $data->status,
                'restaurant'    => $data->restaurant->name
            ];
        }

        return DataTables::of($orders)
        ->addIndexColumn()
        ->addColumn('action', function($orders) {                
            $edit = '
            <a data-toggle="tooltip" title="Show Data" href="'.route('orders.show',['id' => $orders['id']]).'" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></a>
            ';
            return $edit;
        })
        ->addColumn('status', function($orders) {
            $fa_array = [
                "0" => '<span class="badge badge-pill badge-dark"> <i class="fas fa-exclamation-triangle"></i> Processing</span>',
                "1" => '<span class="badge badge-pill badge-info"> <i class="fas fa-check-square"></i> Success</span>',
                "2" => '<span class="badge badge-pill badge-danger"> <i class="fas fa-times"></i>Canceled Success</span>',
            ]; $fa_active = @$fa_array[$orders['status']] ?: null;
            
            return $fa_active;
        })
        ->rawColumns(['status', 'action'])
        ->toJson();
    }

    public function index()
    {
        return view('orders.index');
    }

    public function show($id)
    {
        $order = TOrders::find($id);
        $order_detail = TOrdersDetail::with('menu')
                        ->whereOrderId($id)
                        ->get();

        return view('orders.show', compact('order', 'order_detail'));
    }
}