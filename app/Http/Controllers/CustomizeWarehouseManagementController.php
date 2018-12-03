<?php

namespace App\Http\Controllers;

use App\CustomizeWarehouseManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomizeWarehouseManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:personal_info');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customs = CustomizeWarehouseManagement::all()->sortBy('cwm_id');
        return view('warehouse.management.customize.index',compact('customs'));
    }

    public function details()
    {
        $customs = CustomizeWarehouseManagement::all()->sortBy('cwm_id');
        return view('warehouse.management.customize.details',compact('customs'));
    }

    public function setAction(Request $request)
    {
        if ($request->action == 1) {
            DB::table('customize_warehouse_management')->where('cwm_id',$request->cwm_id)->update([
                'action'=>0
            ]);
            return redirect(url('customize/view'));
        }
    }

    // time taken for each transaction
    public function time()
    {
        $warehouse = CustomizeWarehouseManagement::all()->sortBy('cwm_id');
        return view('warehouse.time',compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
