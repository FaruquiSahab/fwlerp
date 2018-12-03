<?php

namespace App\Http\Controllers;

use App\CustomizeWarehouseManagement;
use App\Employee;
use App\Warehouse;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:personal_info');
    }


    // Simple Warehouse Index Method For Showing Warehouse Details
    public function index()
    {
    	$warehouses  = Warehouse::all()->sortBy('w_id');
        $employee = Employee::pluck('name','id');
    	return view('warehouse.index',compact('warehouses','employee'));
    }

    public function store(Request $request)
    {
    	$warehouses = $request->all();
        $lastId = DB::table('warehouses')->insertGetId($request->except('_token'));
        DB::table('warehouses')->where('w_id',$lastId)
        ->update([
            'free_space' => $request->input('warehouse_space'),
            'free_shelves' => $request->input('no_of_shelves'),
        ]);
        return redirect(route('warehouse.index'));
    }

    public function update(Request $request,$id)
    {

        $title = DB::table('warehouses')->where('w_id', $id)->update([
            'w_name' => $request->input('w_name'),
            'location' => $request->input('location'),
            'warehouse_contract' => $request->input('warehouse_contract'),
            'warehouse_space' => $request->input('warehouse_space'),
            'no_of_shelves' => $request->input('no_of_shelves'),
            'free_space' => $request->input('free_space'),
            'free_shelves' => $request->input('free_shelves'),
            'warehouse_rate' => $request->input('warehouse_rate'),
            'user_id' => $request->input('user_id'),
        ]);

        return response()->json('success');
    }


    public function destroy($id)
    {
    	// $decryptId = decrypt($id);
    	$warehouse =  Warehouse::findOrFail($id);
    	$warehouse->delete();
    }

    //Showing Space wrt Warehouse
    public function space()
    {
        $warehouse = Warehouse::all()->sortBy('w_id');
        return view('warehouse.space',compact('warehouse'));
    }

}
