<?php

namespace App\Http\Controllers;

use App\Barcode;
use DB;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Storage;

class BarcodeController extends Controller
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
        $barcodes = Barcode::where('barcode_status','Free')->get();
        return view('barcode.index',compact('barcodes'));
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
        for ($i=0; $i < $request->input('number'); $i++) { 
            // $barcode = new Barcode;
            // $barcode->barcode_status = Barcode::status;
            // $barcode->save();
        $lastId = DB::table('barcode')->insertGetId($request->except('_token','number'));
        $a = sprintf("%09d", $lastId); 
        Storage::disk('public')->put("barcode" . $lastId . ".png",base64_decode(DNS1D::getBarcodePNG($a, 'C93',1,50)));
        $filename = "barcode".$lastId;
        DB::table('barcode')->where('id',$lastId)
                            ->update([
                                // 'qrcode'=>$lastId,
                                'barcode_status' => Barcode::status,
                                'barcode'=>Storage::disk('public')->path($filename),
                            ]);
                            
        }
        return redirect(route('barcode.index'));
        // return $a;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function show(Barcode $barcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function edit(Barcode $barcode)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $a = sprintf("%09d", $id); 
        Storage::disk('public')->put("barcode" . $id . ".png",base64_decode(DNS1D::getBarcodePNG($a, 'C93',1,50)));
        $filename = "barcode".$id;
        $title = DB::table('barcode')->where('id', $id)->update([
            'barcode_status' => $request->input('barcode_status'),
            'barcode'=>Storage::disk('public')->path($filename),
        ]);

        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
