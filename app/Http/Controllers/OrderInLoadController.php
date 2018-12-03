<?php

namespace App\Http\Controllers;

use App\OrderInLoad;
use App\OrderOffLoad;
use App\Product;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class OrderInLoadController extends Controller
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
        $orders = OrderInLoad::where('customer_id',Auth::id())->where('status','Accepted')->get();
        $ordersoff = OrderOffLoad::where('customer_id',Auth::id())->where('status','Accepted')->get();
        $product = Product::where('customer_id',Auth::id())->pluck('name','p_id');
        $inload = OrderInLoad::where('customer_id',Auth::id())->where('status','accepted')->whereRaw('av_quantity != 0')->pluck('grn','id');
        return view('customer.orderInLoad',compact('orders','product','inload','ordersoff'));
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
        $lastId = DB::table('order_in_load')->insertGetId($request->except('_token'));
        $acr = DB::table('order_in_load')->join('customers','order_in_load.customer_id','customers.id')
                                            ->select('customers.acr')
                                            ->where('order_in_load.id',$lastId)
                                            ->first()
                                            ->acr;
        $grn = "GRN/". $acr . "/" . Carbon::now()->format('d/m/Y/') . $lastId; 
        DB::table('order_in_load')->where('id',$lastId)
                            ->update([
                                // 'av_quantity'=>$request->quantity,
                                // 'av_pkgs'=>$request->no_of_pkgs,
                                'grn' => $grn,
                            ]);
        $totalQ = DB::table('product')->select('quantity')->where('p_id',$request->product_id)->first()->quantity;
        $result = $totalQ - $request->quantity;
        DB::table('product')->where('p_id',$request->product_id)
                            ->update([
                                'quantity'=>$result,
                            ]);
        return redirect(route('order_offload.index'));
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

    public function inOne(Request $request)
    {
            $id = $request->id;
            $dec_id = decrypt($id);
            $ordersin = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.grn, product.name AS p_name, product.packing AS p_packing, order_in_load.quantity, order_in_load.av_quantity AS av_quantity, customers.name, order_in_load.status, order_in_load.created_at')
                                                ->where('order_in_load.id','=',$dec_id)
                                                ->where('order_in_load.customer_id',Auth::id())
                                                ->get();

            return view('customer.in',compact('ordersin'));
    }
    public function inAll(Request $request)
    {
        $ordersin = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.grn, product.name AS p_name, product.packing AS p_packing, order_in_load.quantity, order_in_load.av_quantity, customers.name, order_in_load.status, order_in_load.created_at')
                                                ->where('order_in_load.customer_id',$request->customer_id)
                                                ->where('order_in_load.status','Accepted')
                                                ->get();

        return view('customer.inAll',compact('ordersin'));
    }

    public function inOneOthers(Request $request)
    {
            $id = $request->id;
            $dec_id = decrypt($id);
            $ordersin = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.grn, product.name AS p_name, product.packing AS p_packing, order_in_load.quantity, order_in_load.av_quantity AS av_quantity, customers.name, order_in_load.status, order_in_load.created_at')
                                                ->where('order_in_load.id',$dec_id)
                                                ->where('order_in_load.customer_id',Auth::id())
                                                ->get();

            return view('customer.in',compact('ordersin'));
    }
    public function inAllOthers(Request $request)
    {
        $ordersin = DB::table('order_in_load')->join('product','order_in_load.product_id', '=' ,'product.p_id')
                                                ->join('customers','order_in_load.customer_id', '=' ,'customers.id' )
                                                ->selectRaw('order_in_load.grn, product.name AS p_name, product.packing AS p_packing, order_in_load.quantity, order_in_load.av_quantity, customers.name, order_in_load.status, order_in_load.created_at')
                                                ->where('order_in_load.customer_id',$request->customer_id)
                                                ->where('order_in_load.status', '!=' , 'Accepted')
                                                ->get();

        return view('customer.inAll',compact('ordersin'));
    }


    //                                          // Discarded Work \\

    // public function stock()
    // {
    //     $orders = DB::table('product_logs')->join('product','product_logs.p_id', '=' ,'product.p_id')
    //                                         ->join('customers','product_logs.customer_id','=','customers.id')
    //                                         ->selectRaw('product_logs.id AS pl_id, product.name AS p_name, customers.name AS c_name, product_logs.quantity_in, product_logs.quantity_off, product_logs.type AS pl_type')
    //                                         ->where('product_logs.customer_id',Auth::id())
    //                                         ->get();

    //     return view('customer.mystock',compact('orders'));
    // }


    // public function log(Request $request)
    // {
    //         $id = $request->id;
    //         $ordersin = DB::table('product_logs')->join('product','product_logs.p_id', '=' ,'product.p_id')
    //                                             ->join('customers','product_logs.customer_id', '=' ,'customers.id' )
    //                                             ->selectRaw('product.name AS p_name, product_logs.quantity_in, product_logs.quantity_off, customers.name AS c_name, product_logs.type AS pl_type, product_logs.created_at AS pl_create')
    //                                             ->where('product_logs.id',$id)
    //                                             ->get();

    //         return view('customer.log',compact('ordersin'));
    // }
    // public function logAll(Request $request)
    // {
    //     $ordersin = DB::table('product_logs')->join('product','product_logs.p_id', '=' ,'product.p_id')
    //                                             ->join('customers','product_logs.customer_id', '=' ,'customers.id' )
    //                                             ->selectRaw('product.name AS p_name, product_logs.quantity_in, product_logs.quantity_off, customers.name AS c_name, product_logs.type AS pl_type, product_logs.created_at AS pl_create')
    //                                             ->get();

    //     return view('customer.log',compact('ordersin'));
    // }

}
