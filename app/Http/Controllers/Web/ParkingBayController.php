<?php

namespace Vanguard\Http\Controllers\Web;

use Vanguard\Http\Requests\Parking\CreateUpdateRequest;
use Vanguard\Http\Controllers\Controller;
use Vanguard\TParkingBay;
use DataTables;

class ParkingBayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:parking.manage');
    }

    public function getDataBay()
    {
        $bays = TParkingBay::latest()->get();
            
        return DataTables::of($bays)
        ->addIndexColumn()
        ->addColumn('action', function($bays) {                
            $edit = '
            <a data-toggle="tooltip" title="Edit Data" href="'.route('parking-bays.edit',['parking_bay' => $bays->id]).'" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
            <a data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="Confirm" data-confirm-text="Are you sure to delete this data?" data-confirm-delete="Delete" title="Delete" href="'.route('parking-bays.destroy',['parking_bay' => $bays->id]).'" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
            ';
            return $edit;
        })
        ->addColumn('status', function($orders) {
            $fa_array = [
                "1" => '<span class="badge badge-pill badge-success"> <i class="fas fa-dot-circle"></i> Available</span>',
                "2" => '<span class="badge badge-pill badge-info"> <i class="fas fa-check-square"></i> Occupied</span>',
                "3" => '<span class="badge badge-pill badge-dark"> <i class="fas fa-times"></i> Fully Booked</span>',
            ]; $fa_active = @$fa_array[$orders['status']] ?: null;
            
            return $fa_active;
        })
        ->rawColumns(['status', 'action'])
        ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parking-bays.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parking-bays.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateRequest $request)
    {
        $inputs = $request->all();

        $bays = TParkingBay::create($inputs);

        return redirect()->route('parking-bays.index')
            ->withSuccess('Success submited data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bays = TParkingBay::find($id);

        return view('parking-bays.edit', compact('bays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateRequest $request, $id)
    {
        $inputs = $request->all();
        
        $bays = TParkingBay::find($id);
        $bays->update($inputs);

        return redirect()->back()
            ->withSuccess('Success updated data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bays = TParkingBay::findOrFail($id);
        $bays->delete();

        return redirect()->back()
            ->withSuccess('Success delete data');
    }
}