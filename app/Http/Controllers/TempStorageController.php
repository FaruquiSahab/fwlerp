<?php

namespace App\Http\Controllers;

use App\Location;
use App\TempStorage;
use App\Warehouse;
use DB;
use Illuminate\Http\Request;

class TempStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp_storage  = TempStorage::all()->sortBy('id');
        
        // $warehouse = Warehouse::pluck('w_name','w_id');
        $location = Location::pluck('location_city','location_city');
        return view('warehouse.temp.storage',compact('temp_storage','warehouse','location'));
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
        $data = $request->all();
        TempStorage::create($data);
        $space =  DB::table('warehouses')->select('free_space')->where('w_id',$request->w_id)->first()->free_space;
        $shelve = DB::table('warehouses')->select('free_shelves')->where('w_id',$request->w_id)->first()->free_shelves;
        $updateSpace = $space - $request->space_taken;
        $updateShelve = $shelve - $request->shelves_taken;
        DB::table('warehouses')->where('w_id',$request->w_id)->update([
            'free_space'=>$updateSpace,
            'free_shelves'=>$updateShelve
        ]);
        return redirect(route('temp.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TempStorage  $tempStorage
     * @return \Illuminate\Http\Response
     */
    public function show(TempStorage $tempStorage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempStorage  $tempStorage
     * @return \Illuminate\Http\Response
     */
    public function edit(TempStorage $tempStorage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempStorage  $tempStorage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempStorage  $tempStorage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $space =  DB::table('warehouses')->select('free_space')->where('w_id',$request->w_id)->first()->free_space;
        $shelve = DB::table('warehouses')->select('free_shelves')->where('w_id',$request->w_id)->first()->free_shelves;

        $updateSpace = $space + $request->spaceDelete;
        $updateShelve = $shelve + $request->shelvesDelete;
        DB::table('warehouses')->where('w_id',$request->w_id)->update([
            'free_space'=>$updateSpace,
            'free_shelves'=>$updateShelve,
        ]);

        $temp = TempStorage::findOrFail($id);
        $temp->delete();
        
    }

    public function warehouseByCity(Request $request)
    {
        $city = $request->city;
        $warehouse = DB::table('warehouses')->select('w_id','w_name')->where('location', $city)->get();
        return json_encode( $warehouse);
        // 
        // return $request;
    }
    public function sapceByWarehouse(Request $request)
    {
        $id = $request->id;
        $space = DB::table('warehouses')->select('free_space')->where('w_id',$id)->get();
        echo json_encode($space);
    }

    public function shelveByWarehouse(Request $request)
    {
        $id = $request->id;
        $shelve = DB::table('warehouses')->select('free_shelves')->where('w_id',$id)->get();
        echo json_encode($shelve);
    }
}
