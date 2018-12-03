<?php

namespace App\Http\Controllers;

use App\Distribution;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributions = Distribution::where('re_routed',0)->orderBy('d_id')->get();
        $distributions1 =Distribution::where('re_routed',1)->orderBy('d_id')->get();
        return view('distribution.index',compact('distributions','distributions1'));
    }

    public function details()
    {
        $distributions = Distribution::all();
        return view('distribution.details',compact('distributions'));
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
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
        //
    }

    public function setStatus(Request $request)
    {
        if ($request->status == 'Delivered') {
            DB::table('distribution')->where('d_id',$request->d_id)->update([
                'status'=>'Done',
                'delivered_status_time'=>Carbon::now(),
            ]);
            return redirect(route('distribution.index'));
        }
        elseif ($request->status == 'Received') {
            DB::table('distribution')->where('d_id',$request->d_id)->update([
                'status'=>'Delivered',
                'accept_status_time'=>Carbon::now(),
            ]);
            return redirect(route('distribution.index'));
        }
        
    }

    public function setCheck(Request $request)
    {
        if ($request->re_routed == 1) {
            DB::table('distribution')->where('d_id',$request->d_id)->update([
                're_routed'=>0
            ]);
            return redirect(route('distribution.index'));
        }
        elseif ($request->re_routed == 0) {
            DB::table('distribution')->where('d_id',$request->d_id)->update([
                're_routed'=>1,
                'status'=>'Delivered?'
            ]);
            return redirect(route('distribution.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        //
    }
}
