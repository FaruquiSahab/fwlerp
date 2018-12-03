<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
    	$transactions  = Transaction::all()->sortBy('t_id');
    	return view('transaction.index',compact('transactions'));
    }

    public function view()
    {
    	$transactions = Transaction::whereRaw("route_from = route_to")->get();
    	return view('transaction.intercity',compact('transactions'));
    	// return $transactions;
    }
    // 
    
}
