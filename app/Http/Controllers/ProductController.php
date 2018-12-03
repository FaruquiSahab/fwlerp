<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use DB;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customers,personal_info');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::pluck('name','id');
        $products = Product::all();
        
         if (Auth::guard('customers')->user()) {
            $c_id = Auth::guard('customers')->user()->id;
            $products = Product::where('customer_id',$c_id)->get();
        }
        elseif (Auth::guard('personal_info')->user()) {
            $products = Product::all();
        }
        return view('product.index',compact('products','customers'));
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
        $products = $request->all();


        $lastId = DB::table('product')->insertGetId($request->except('_token'));
        $a  = sprintf("%09d", $lastId);
        $b  = $request->name . "/". $request->packing . "/". $a;
        Storage::disk('public')->put("product" .$lastId . ".png",base64_decode(DNS1D::getBarcodePNG($b,'C93',1,50)));
        $filename = "product".$lastId;
        DB::table('product')->where('p_id',$lastId)
                            ->update([
                                // 'qrcode'=>$lastId,
                                'qrcode'=>Storage::disk('public')->path($filename),
                            ]);
        // DB::table('product_logs')->insert([
        //     'p_id'=>$lastId,
        //     'customer_id'=>$request->customer_id,
        //     'quantity_in'=>$request->quantity,
        //     'quantity_off'=>NULL,
        //     'type'=>'New'
        // ]);
        return Redirect::back();
        // return $b;
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
        if ($request->input('name')=='') 
        {
            return response()->json('error');
        }
        elseif ($request->input('name')== NULL) 
        {
            return response()->json('error');
        }
        else
        {
            $a  = sprintf("%09d", $id);
            $b  = $request->name . "/" . $request->packing . "/" . $a;
            Storage::disk('public')->put("product" . $id . ".png",base64_decode(DNS1D::getBarcodePNG($b, 'C93',1,50)));
            $filename = "product".$id;
            $title = DB::table('product')->where('p_id', $id)->update([
                'name' => $request->input('name'),
                'quantity' => $request->input('quantity'),
                'type' => $request->input('type'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'qrcode'=>Storage::disk('public')->path($filename),
                'packing' => $request->input('packing'),
            ]);

            //log work
            // $pehlyQuantity = DB::table('product')->select('quantity')->where('p_id',$id)->first()->quantity;
            // $req_quantity = $request->input('quantity');
            // if ($pehlyQuantity > $req_quantity ) 
            // {
            //     $abQuantity = $pehlyQuantity - $req_quantity;
            //     DB::table('product_logs')->insert([
            //         'p_id'=>$id,
            //         'customer_id'=>$request->input('customer_id'),
            //         'quantity_off'=>$abQuantity,
            //         'quantity_in'=>NULL,
            //         'type'=>'Decrease'
            //     ]);                
            // }
            // elseif ($pehlyQuantity < $req_quantity) 
            // {
            //     $abQuantity = $req_quantity - $pehlyQuantity;
            //     DB::table('product_logs')->insert([
            //         'p_id'=>$id,
            //         'customer_id'=>$request->input('customer_id'),
            //         'quantity_off'=>NULL,
            //         'quantity_in'=>$abQuantity,
            //         'type'=>'Increase'
            //     ]);
            // }
            //update work
            
            
            return response()->json('success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::findOrFail($id);
        $product->delete();
    }

    public function quantity(Request $request)
    {
        // return $request;
        $id  = $request->p_id;
        $quantity = DB::table('product')->select('quantity')->where('p_id',$id)->first()->quantity;
        $q = $request->quantity;
        $sum = $quantity + $q;
        $title = DB::table('product')->where('p_id', $id)->update([
            'quantity' => $sum
        ]);
        DB::table('product_logs')->insert([
            'p_id'=>$request->p_id,
            'customer_id'=>$request->customer_id,
            'quantity_in'=>$request->quantity,
            'quantity_off'=>NULL,
            'type'=>'Increase'
        ]);
        return Redirect::back();

    }

    public function productBy(Request $request)
    {
        $id = $request->id;
        $quantityOfProduct = DB::table('product')->select('quantity')->where('p_id',$id)->first()->quantity;
        echo json_encode($quantityOfProduct);
        exit();
    }

    public function barcode()
    {
        return view('qrcode');
    }
}
