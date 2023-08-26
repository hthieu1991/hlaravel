<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    function getPageName(){
        // dd(Route::current()->uri);
        $uri = Route::current()->uri;
        if($uri == 'register'){
            $page_name = "Register";
        } else {
            $page_name = "Index";
        }

        return $page_name;
    }
}
