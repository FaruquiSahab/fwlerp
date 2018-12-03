<?php

namespace App\Http\Controllers;

use App\Consignee;
use App\OrderInLoad;
use App\OrderOffLoad;
use App\Product;
use App\Warehouse;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Redirect;

class OrderOffLoadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customers');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        $orders = OrderOffLoad::where('customer_id',Auth::id())->where('status','!=','Accepted')->get();
        $product = Product::where('customer_id',Auth::id())->pluck('name','p_id');
        $inload = OrderInLoad::where('customer_id',Auth::id())->where('status','!=','Accepted')->get();
        $inloads = OrderInLoad::where('customer_id',Auth::id())->where('status','=','Accepted')->pluck('grn','id');
        $consignee = Consignee::where('customer_id',Auth::id())->pluck('name','id');
        return view('customer.orderOffLoad',compact('orders','product','inload','inloads','consignee'));
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
                            ]);
        
        
        // $pkgsOfOrder = DB::table('order_in_load')->select('av_pkgs')->where('id',$request->in_Id)->first()->av_pkgs;
        // $sumPkgs = $pkgsOfOrder - $request->no_of_pkgs;
        $quantityOfOrder = DB::table('order_in_load')->select('av_quantity')->where('id',$request->in_Id)->first()->av_quantity;
        $sumquantity = $quantityOfOrder - $request->quantity;
        

        DB::table('order_in_load')->where('id',$request->in_Id)->update([
            // 'av_pkgs' => $sumPkgs,
            'av_quantity' => $sumquantity
        ]);
        return redirect()->back();
    }


    public function productByOrder(Request $request)
    {
        $id = $request->id;
        $productIdOfOrder = DB::table('order_in_load')->select('product_id')->where('id',$id)->first()->product_id;
        $product = Product::findOrFail($productIdOfOrder);
        echo json_encode($product);
        exit();
        
    }
    public function quantityByOrder(Request $request)
    {
        $id = $request->id;
        $quantityOfOrder = DB::table('order_in_load')->select('av_quantity')->where('id',$id)->first()->av_quantity;
        echo json_encode($quantityOfOrder);
        exit();
    }
    public function pkgsByOrder(Request $request)
    {
        $id = $request->id;
        $pkgsOfOrder = DB::table('order_in_load')->select('av_pkgs')->where('id',$id)->first()->av_pkgs;
        echo json_encode($pkgsOfOrder);
        exit();
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

    public function offOne(Request $request)
    {
            $id = $request->id;
            $dec_id = decrypt($id);
            $ordersoff = DB::table('order_off_load')->join('product','order_off_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_off_load.customer_id', '=' ,'customers.id' )
                                                ->join('order_in_load','order_off_load.inload_id', '=' ,'order_in_load.id')
                                                ->join('consignee','order_off_load.consignee_id', '=' ,'consignee.id')
                                                ->selectRaw('order_off_load.dcn, order_in_load.grn, product.name AS p_name, order_off_load.created_at, product.packing,order_off_load.quantity, customers.name, consignee.name AS cn_name, order_off_load.status, order_off_load.created_at')
                                                ->where('order_off_load.status','=','Accepted')
                                                ->where('order_off_load.id',$dec_id)
                                                ->where('order_off_load.customer_id',Auth::id())
                                                ->get();

            return view('customer.off',compact('ordersoff'));
    }
    public function offAll(Request $request)
    {
        $ordersoff =DB::table('order_off_load')->join('product','order_off_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_off_load.customer_id', '=' ,'customers.id' )
                                                ->join('order_in_load','order_off_load.inload_id', '=' ,'order_in_load.id')
                                                ->join('consignee','order_off_load.consignee_id', '=' ,'consignee.id')
                                                ->selectRaw('order_off_load.dcn, order_in_load.grn, product.name AS p_name, order_off_load.created_at, product.packing,order_off_load.quantity, customers.name, consignee.name AS cn_name, order_off_load.status, order_off_load.created_at')
                                                ->where('order_off_load.status','=','Accepted')
                                                ->where('order_off_load.customer_id',Auth::id())
                                                ->get();

        return view('customer.offAll',compact('ordersoff'));
    }


    public function offOneOthers(Request $request)
    {
            $id = $request->id;
            $dec_id = decrypt($id);
            $ordersoff = DB::table('order_off_load')->join('product','order_off_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_off_load.customer_id', '=' ,'customers.id' )
                                                ->join('order_in_load','order_off_load.inload_id', '=' ,'order_in_load.id')
                                                ->join('consignee','order_off_load.consignee_id', '=' ,'consignee.id')
                                                ->selectRaw('order_off_load.dcn, order_in_load.grn, product.name AS p_name, order_off_load.created_at, product.packing,order_off_load.quantity, customers.name, consignee.name AS cn_name, order_off_load.status, order_off_load.created_at')
                                                ->where('order_off_load.status','!=','Accepted')
                                                ->where('order_off_load.id',$dec_id)
                                                ->where('order_off_load.customer_id',Auth::id())
                                                ->get();

            return view('customer.off',compact('ordersoff'));
    }
    public function offAllOthers(Request $request)
    {
        $ordersoff =DB::table('order_off_load')->join('product','order_off_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_off_load.customer_id', '=' ,'customers.id' )
                                                ->join('order_in_load','order_off_load.inload_id', '=' ,'order_in_load.id')
                                                ->join('consignee','order_off_load.consignee_id', '=' ,'consignee.id')
                                                ->selectRaw('order_off_load.dcn, order_in_load.grn, product.name AS p_name, order_off_load.created_at, product.packing,order_off_load.quantity, customers.name, consignee.name AS cn_name, order_off_load.status, order_off_load.created_at')
                                                ->where('order_off_load.status','!=','Accepted')
                                                ->where('order_off_load.customer_id',Auth::id())
                                                ->get();

        return view('customer.offAll',compact('ordersoff'));
    }

    public function warehouseByCity(Request $request)
    {
        $city = $request->city;
        $warehouse = DB::table('warehouses')->select('w_id','w_name')->where('location', $city)->get();
        return json_encode( $warehouse);       
    }
}
