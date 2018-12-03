<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientCompany;
use App\Employee;
use App\Warehouse;
use App\WarehouseManagement;
use DB;
use Illuminate\Http\Request;

class WarehouseManagementController extends Controller
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
        $client = Client::pluck('name','id');
        $employee = Employee::pluck('name','id');
        $company = ClientCompany::pluck('corporate_name','company_id');
        $warehouse = Warehouse::pluck('w_name','w_id');

        $managements = WarehouseManagement::all()->sortBy('wm_id');
        return view('warehouse.management.index',compact('managements','client','employee','company','warehouse'));
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
        $managements= $request->all();
        WarehouseManagement::create($managements);
        return redirect(route('warehouse.index'));
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
        $title = DB::table('warehouse_management')->where('wm_id', $id)->update([
            'client_id' => $request->input('client_id'),
            'sales_person_id' => $request->input('sales_person_id'),
            'w_id' => $request->input('w_id'),
            'no_of_shelves' => $request->input('no_of_shelves'),
            'duration' => $request->input('duration'),
            'amount' => $request->input('amount'),
            'rate_per_day' => $request->input('rate_per_day'),
            'rate_per_space' => $request->input('rate_per_space'),
            'qrcode' => $request->input('qrcode'),
            'company_id' => $request->input('company_id'),
            'contract_type' => $request->input('contract_type'),
        ]);

        return response()->json('success');
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
