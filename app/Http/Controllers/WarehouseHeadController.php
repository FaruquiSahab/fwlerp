<?php

namespace App\Http\Controllers;

use App\Consignee;
use App\Customer;
use App\Mcr;
use App\OrderInLoad;
use App\OrderOffLoad;
use App\PersonalInfo;
use App\Product;
use App\Vehicle;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use PDF;
use Redirect;
ini_set('max_execution_time', 300);

class WarehouseHeadController extends Controller
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
        $customers  = Customer::all();
        return view('warehouse.customer.index',compact('customers'));
    }
    public function index2()
    {
        $customers  = Customer::all();
        return view('warehouse.customer.index2',compact('customers'));
    }

    public function stock()
    {

        // $model = OrderInLoad::get();

        $orders = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                            ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                            ->selectRaw('order_in_load.id, product.name AS p_name, product.packing,product.weight, SUM(order_in_load.quantity) AS quantity, SUM(order_in_load.av_quantity) AS Total_Quantity, customers.name')
                                            ->where('status','=','Accepted')
                                            ->groupBy('product.name')
                                            ->get();
                                            //
        // $data = DB::table('order_in_load')->selectRaw('product_id, customer_id, SUM(av_quantity) AS sum')->groupBy('product_id')->get();
        // return $orders;
        return view('warehouse.customer.stock',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function customerProduct($id)
    {
        // return "Hello";
        $cid = $id;
        $did =decrypt($cid);
        $customer = Customer::where('id',$did)->pluck('name','id');
        $customers = Customer::where('id',$did)->select('name','id')->get();
        // $customer = Customer::select('name','id')->where('id',$did)->get();
        $products = Product::where('customer_id',$did)->get();
        // $product = Product::findOrFail($productIdOfOrder);
        return view('warehouse.customer.product',compact('products','customer','customers'));
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
        $dec_id = decrypt($id);
        // $product = Product::pluck('name','p_id');
        // $customer = Customer::pluck('name','id');
        $ordersoffintra = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, customers.id AS c_id, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->where('order_off_load.customer_id',$dec_id)
                            ->whereRaw('order_off_load.inload_id = order_in_load.id')
                            ->whereRaw('order_off_load.picked != 1')
                            ->whereRaw('warehouses.location = consignee.location')
                            ->get();
        $ordersoffinter = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, customers.id AS c_id, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->where('order_off_load.customer_id',$dec_id)
                            ->whereRaw('order_off_load.inload_id =order_in_load.id')
                            ->whereRaw('warehouses.location != consignee.location')
                            ->whereRaw('order_off_load.picked != 1')
                            ->get();
        // return $ordersoffintra;
        // $ordersoffintra =  OrderOffLoad::where('customer_id',$dec_id)->where('status','Pending')->get();
        // $ordersoffinter = OrderOffLoad::where('customer_id',$dec_id)->get();
        $consignee = Consignee::where('customer_id',$dec_id)->pluck('name','id');    
        $customer = Customer::where('id',$dec_id)->pluck('name','id')->all();
        $product = Product::where('customer_id',$dec_id)->pluck('name','p_id');
        $inload = OrderInLoad::where('status','accepted')->where('customer_id',$dec_id)->whereRaw('av_quantity != 0')->pluck('grn','id');
        // $inload = OrderInLoad::where('status','accepted')->whereRaw('av_quantity != 0')->pluck('id','id');
        
        return view('warehouse.customer.order',compact('ordersoffintra','ordersoffinter','customer','product','inload','consignee'));
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


    public function customerStore(Request $request )
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->acr = $request->acr;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->contact_no = $request->contact_no;
        $customer->address = $request->address;
        $customer->save();
        // return redirect(route('head.index'));
        return Redirect::back();
    }
    public function customerUpdate(Request $request, $id )
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->contact_no = $request->contact_no;
        $customer->address = $request->address;
        $customer->save();


        return response()->json('success');
    }

    public function showDispatch()
    {
        $inload = OrderInLoad::where('status','accepted')->whereRaw('av_quantity != 0')->pluck('grn','id');

        return view('warehouse.customer.dispatch',compact('inload'));
    }
    public function dispatchOrder(Request $request)
    {
        $lastId =DB::table('order_off_load')->insertGetId($request->except('in_Id','_token'));
        $acr = DB::table('order_off_load')->join('customers','order_off_load.customer_id','customers.id')
                                            ->select('customers.acr')
                                            ->where('order_off_load.id',$lastId)
                                            ->first()
                                            ->acr;
        $dcn = "FWL/". $acr . "/" . Carbon::now()->format('d/m/Y/') . $lastId;
        DB::table('order_off_load')->where('id',$lastId)
                            ->update([
                                'dcn' => $dcn,
                                'status'=> 'Accepted',
                            ]);
        
        // $pkgsOfOrder = DB::table('order_in_load')->select('av_pkgs')->where('id',$request->in_Id)->first()->av_pkgs;
        // $sumPkgs = $pkgsOfOrder - $request->no_of_pkgs;
        $quantityOfOrder = DB::table('order_in_load')->select('av_quantity')->where('id',$request->in_Id)->first()->av_quantity;
        $sumquantity = $quantityOfOrder - $request->quantity;
        DB::table('order_in_load')->where('id',$request->in_Id)->update([
            // 'av_pkgs' => $sumPkgs,
            'av_quantity' => $sumquantity
        ]);
        return Redirect::back();
    }


    public function showRecieve()
    {
        $customer = Customer::pluck('name','id');
        $product = Product::pluck('name','p_id');
        return view('warehouse.customer.recieve',compact('customer','product'));
    }


    public function recieveOrder(Request $request)
    {
        // $quantity = $request->quantity;
        // $id = $request->product_id;
        // $pQuantity = DB::table('product')->select('quantity')->where('p_id',$id)->first()->quantity;
        // $result = $pQuantity - $quantity;
        // DB::table('product')->where('p_id',$id)->update([
        //     'quantity'=>$result
        // ]);
        // DB::table('product_logs')->insert([
        //             'p_id'=>$request->product_id,
        //             'customer_id'=>$request->customer_id,
        //             'quantity_in'=>NULL,
        //             'quantity_off'=>$request->quantity,
        //             'type'=>'Inload'
        //         ]);

        $lastId = DB::table('order_in_load')->insertGetId($request->except('_token'));
        $acr = DB::table('order_in_load')->join('customers','order_in_load.customer_id','customers.id')
                                            ->select('customers.acr')
                                            ->where('order_in_load.id',$lastId)
                                            ->first()
                                            ->acr;
        $grn = "GRN/". $acr . "/" . Carbon::now()->format('d/m/Y/') . $lastId; 
        DB::table('order_in_load')->where('id',$lastId)
                            ->update([
                                'av_quantity'=>$request->quantity,
                                'grn'=>$grn,
                                'status'=>'Accepted',
                                // 'av_pkgs'=>$request->no_of_pkgs,
                            ]);
        
        
        return Redirect::back();
        // return redirect(route('head.index'));
        // return $acr;
    }

    //change request inload
    public function changeIn(Request $request, $id)
    {
        if ($request->status == 'Accepted') 
        {
            // DB::table('product_logs')->insert([
            //     'p_id'=>$request->product_id,
            //     'customer_id'=>$request->customer_id,
            //     'quantity_in'=>NULL,
            //     'quantity_off'=>$request->av_quantity,
            //     'type'=>'Inload'
            // ]);
            DB::table('order_in_load')->where('id',$id)->update([
                'status' => $request->status,
                'sealStatus' => $request->sealStatus,
                'remarks' => $request->remarks,
                'av_quantity' => $request->av_quantity
            ]);
            return response()->json('success');
        }
        elseif ($request->status == 'Rejected') 
        {
            // $pehlyKiQuantity = DB::table('product')->select('quantity')->where('p_id',$request->product_id)->first()->quantity;
            // $quantity = DB::table('order_in_load')->select('quantity')->where('id',$request->id)->first()->quantity;
            // $result = $pehlyKiQuantity + $quantity;
            // DB::table('product')->where('p_id',$request->product_id)->update([
            //     'quantity'=>$result,
            // ]);

            DB::table('order_in_load')->where('id',$id)->update([
                'status' => $request->status,
                'sealStatus' => $request->sealStatus,
                'remarks' => $request->remarks,
                'av_quantity' => 0
            ]);
            return response()->json('success');
        }
        // // return redirect(route('head.show',$request->customer_id));
        // return redirect()->back();
        return response()->json('error');
    }


    //change request offload
    public function changeOff(Request $request, $id)
    {
        // return $request->quantity;
        if ($request->quantity== NULL ||$request->status== NULL) {
            return response()->json('error');
        }
        else
        {
            DB::table('order_off_load')->where('id',$request->id)->update([
                'status' => $request->status,
                'remarks' => $request->remarks,
                'quantity' => $request->quantity
            ]);
            return response()->json('success');
        }
        // // return redirect(route('head.show',$request->customer_id));
        // return redirect()->back();
        
    }


    public function productByOrder(Request $request)
    {
        $id = $request->id;
        $productIdOfOrder = DB::table('order_in_load')->select('product_id')->where('id',$id)->first()->product_id;
        $product = Product::findOrFail($productIdOfOrder);
        echo json_encode($product);
        exit();
    }

    public function productByCustomer(Request $request)
    {
        $id = $request->id;
        $productsOfCustomer = Product::where('customer_id',$id)->get();
        // $product = Product::findOrFail($productIdOfOrder);
        echo json_encode($productsOfCustomer);
        exit();
    }

    public function customerByOrder(Request $request)
    {
        $id = $request->id;
        $customerIdOfOrder = DB::table('order_in_load')->select('customer_id')->where('id',$id)->first()->customer_id;
        $customer = Customer::findOrFail($customerIdOfOrder);
        echo json_encode($customer);
        exit();
    }
    public function quantityByOrder(Request $request)
    {
        $id = $request->id;
        $quantityOfOrder = DB::table('order_in_load')->select('av_quantity')->where('id',$id)->first()->av_quantity;
        echo json_encode($quantityOfOrder);
        exit();
    }

    public function productBy(Request $request)
    {
        $id = $request->id;
        $quantityOfProduct = DB::table('product')->select('quantity')->where('p_id',$id)->first()->quantity;
        echo json_encode($quantityOfProduct);
        exit();
    }

    public function report(Request $request)
    {

           $orders = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')->join('personal_info','order_in_load.customer_id', '=' ,'personal_info.personal_info_personal_id' )->selectRaw('order_in_load.id, product.name, product.packing,product.weight, SUM(order_in_load.quantity) AS quantity, SUM(order_in_load.av_quantity) AS Total_Quantity, personal_info.personal_info_person_name')->where('status','=','Accepted')->groupBy('product.name')->get();

            // PDF::setOptions(['dpi' => 150]);
            // $pdf = PDF::loadView('warehouse.customer.stock',['orders'=>$orders]);
            // return $pdf->stream('stock.pdf', array('Attachment'=>0));
           
    }
    public function reportOne(Request $request)
    {
            $id = $request->id;
            $dec_id = decrypt($id);
            $orders = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.id, product.name, product.packing,product.weight, SUM(order_in_load.quantity) AS quantity, SUM(order_in_load.av_quantity) AS Total_Quantity, customers.name')
                                                ->where('status','=','Accepted')
                                                ->where('order_in_load.id','=',$dec_id)
                                                ->groupBy('product.name')
                                                ->get();

            return view('warehouse.customer.report',compact('orders'));
    }
    public function reportAll()
    {
        $orders = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.id, product.name, product.packing,product.weight, SUM(order_in_load.quantity) AS quantity, SUM(order_in_load.av_quantity) AS Total_Quantity, customers.name')
                                                ->where('status','=','Accepted')
                                                ->groupBy('product.name')
                                                ->get();

        return view('warehouse.customer.reportAll',compact('orders'));
    }

    public function inOne(Request $request)
    {
            $id = $request->id;
            $dec_id = decrypt($id);
            $ordersin = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.grn, product.name AS p_name, product.packing,order_in_load.quantity, order_in_load.av_quantity, customers.name, order_in_load.status, order_in_load.created_at')
                                                ->where('order_in_load.id','=',$dec_id)
                                                ->groupBy('product.name')
                                                ->get();

            return view('warehouse.customer.in',compact('ordersin'));
    }
    public function inAll()
    {
        $ordersin = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.grn, product.name AS p_name, product.packing, order_in_load.quantity, order_in_load.av_quantity, customers.name, order_in_load.status, order_in_load.created_at')
                                                ->where('status','=','Accepted')
                                                // ->groupBy('product.name')
                                                ->get();

        return view('warehouse.customer.inAll',compact('ordersin'));
    }

    public function offOneIntra(Request $request)
    {
            //order id
            $id = $request->id;
            $dec_id = decrypt($id);
            //customer_id
            $c_id = $request->c_id;
            $dec_c_id = decrypt($c_id);
            $ordersoff = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->where('order_off_load.customer_id',$dec_c_id)
                            ->where('order_off_load.id',$dec_id)
                            ->whereRaw('order_off_load.inload_id = order_in_load.id')
                            ->whereRaw('warehouses.location = consignee.location')
                            ->get();

            return view('warehouse.customer.off',compact('ordersoff'));
    }    
    public function offAllIntra(Request $request)
    {
            //customer id
            $id = $request->c_id;
            $dec_c_id = decrypt($id);
            $ordersoff = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->where('order_off_load.customer_id',$dec_c_id)
                            ->whereRaw('order_off_load.inload_id = order_in_load.id')
                            ->whereRaw('warehouses.location = consignee.location')
                            ->get();

            return view('warehouse.customer.off',compact('ordersoff'));
    }

    public function offOneInter(Request $request)
    {
         //order id
        $id = $request->id;
        $dec_id = decrypt($id);
        //customer_id
        $c_id = $request->c_id;
        $dec_c_id = decrypt($c_id);

        $ordersoff = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->where('order_off_load.customer_id',$dec_c_id)
                            ->where('order_off_load.id',$dec_id)
                            ->whereRaw('order_off_load.inload_id =order_in_load.id')
                            ->whereRaw('warehouses.location != consignee.location')
                            ->get();
        return view('warehouse.customer.off',compact('ordersoff'));
    }
    public function offAllInter(Request $request)
    {
        //customer id
        $c_id = $request->c_id;
        $dec_c_id = decrypt($c_id);
        $ordersoff = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->where('order_off_load.customer_id',$dec_c_id)
                            ->whereRaw('order_off_load.inload_id =order_in_load.id')
                            ->whereRaw('warehouses.location != consignee.location')
                            ->get();
        return view('warehouse.customer.off',compact('ordersoff'));
    }
    // pick order intra city
    public function pickorder(Request $request)
    {
        $id = decrypt($request->id);
        $order = OrderOffLoad::findOrFail($id);
        $order->picked = 1;
        $order->save();

        if ($order)
        {
            return $this->assignVehicle();
        }

    }
    // pick order inter city
    public function pickorderI(Request $request)
    {
        $id = decrypt($request->id);
        $order = OrderOffLoad::findOrFail($id);
        $order->picked = 1;
        $order->save();

        if ($order)
        {
            return $this->assignVehicleI();
        }

    }
    //intra city assign
    public function assignVehicle()
    {
        $digits = 6;
        $unique = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        $ordersoff = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, customers.id AS c_id, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->whereRaw('order_off_load.inload_id = order_in_load.id')
                            ->whereRaw('order_off_load.picked != 0')
                            ->whereRaw('warehouses.location = consignee.location')
                            ->get();
        return view('warehouse.customer.assignvehicle',compact('ordersoff','unique'));
    }
    // inter city assign
    public function assignVehicleI()
    {
        $digits = 6;
        $unique = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        $ordersoff = DB::table('order_off_load')
                            ->join('consignee','order_off_load.consignee_id','=','consignee.id')
                            ->join('product','order_off_load.product_id','=','product.p_id')
                            ->join('customers','order_off_load.customer_id','=','customers.id')
                            ->join('order_in_load','order_off_load.inload_id','=','order_in_load.id')
                            ->join('warehouses','order_off_load.w_id','=','warehouses.w_id')
                            ->selectRaw('order_off_load.id, order_off_load.dcn, order_off_load.remarks AS o_remarks, order_in_load.grn, customers.name AS c_name, customers.id AS c_id, warehouses.location AS w_location, warehouses.w_name, product.name AS p_name, product.packing AS p_packing, order_off_load.quantity AS o_quantity, consignee.name AS cn_name, consignee.address AS cn_address, consignee.pic AS cn_pic, consignee.location as cn_location, consignee.contact AS cn_contact, order_off_load.order_type AS o_order_type')
                            ->whereRaw('order_off_load.inload_id =order_in_load.id')
                            ->whereRaw('warehouses.location != consignee.location')
                            ->whereRaw('order_off_load.picked != 0')
                            ->get();
        return view('warehouse.customer.assignvehicle',compact('ordersoff','unique'));                    
    }

    public function assigncheck(Request $request)
    {
        // return $request;
        DB::table('assign_vehicle')->insert(array('fake_unique'=>$request->fake_unique,'order_id'=>$request->order_id));
    }

    public function assignuncheck(Request $request)
    {
        // return $request;
        DB::table('assign_vehicle')->where('fake_unique',$request->fake_unique)->where('order_id',$request->order_id)->delete();
    }
    public function showvehiclemcr(Request $request)
    {
        // return $request->order_id;
        $selected = DB::table('assign_vehicle')
        ->join('order_off_load','assign_vehicle.order_id','order_off_load.id')
        ->selectRaw('order_off_load.dcn AS dcn, assign_vehicle.order_id AS id, order_off_load.customer_id')
        ->where('assign_vehicle.fake_unique',$request->unique)
        ->get();
        $id = DB::table('assign_vehicle')->select('order_id')->where('fake_unique',$request->unique)->first()->order_id;
        $customer_id = OrderOffLoad::select('customer_id')->where('id',$id)->first()->customer_id;
        return view('warehouse.customer.vehiclemcr',compact('selected','customer_id'));
    }

    public function submitvehicle($value='')
    {
        # code...
    }

    public function showmcr()
    {

        $vehicles = Vehicle::pluck('vehicle_number','vehicle_ID');
        $vendors = Customer::pluck('name','id');
        $mcrs = Mcr::all();
        return view('warehouse.customer.mcrindex',compact('mcrs','vehicles','vendors'));
    }

    public function storemcr(Request $request)
    {
        $mcr = $request->all();
        Mcr::create($mcr);
        return $this->showmcr();
    }

    public function checking(Request $request)
    {
        return $request;
    }
}