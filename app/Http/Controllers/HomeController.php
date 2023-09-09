<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function __construct(){

    }

    function index(){
        $products = DB::table('products')
                    ->select('id', 'p_name', 'p_price', 'p_desc', 'p_status', 'p_total', 'p_img')
                    ->limit(12)
                    ->get();
        
        return view('homepage', compact('products'));
    }
}
