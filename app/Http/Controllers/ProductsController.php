<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function addProduct(){
        dd(request()->all());
    }
}
