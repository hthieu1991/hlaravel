<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Show Index Page
Route::get('/', function () {
    return view('homepage');
});

// Show Products Page
Route::get('/products', function () {
    return view('products');
});

// Show About Page
Route::get('/about', function () {
    return view('about');
});

// Show Profile Page with check if login or not
Route::get('/profile', [UsersController::class, 'profileUser'])->middleware("auth");

// Logout
Route::get('/logout', [UsersController::class, 'logoutUser']);

// Show Register Form
Route::get('/register', function (PagesController $pagesController) {
    $pagename = $pagesController->getPageName();
    return view('register')->with("pagename", $pagename);
});

// Show Login Form
Route::get('/login', function (PagesController $pagesController) {
    $pagename = $pagesController->getPageName();
    return view('login')->with("pagename", $pagename);
})->name("login");


// Sumit Register Form
Route::post('/register', [UsersController::class, 'registerUser']);

// Sumit Register Form
Route::post('/login', [UsersController::class, 'loginUser']);

// Group Admin pages
Route::prefix('adm')->group(function(){

    Route::prefix('products')->group(function(){

        Route::get("add_product", function(){
            return view("adm.product_add");
        })->middleware("auth")->name("add_product");

        Route::post("add_product", [ProductsController::class, 'addProduct']);

        Route::get("list_product", [ProductsController::class, 'listProduct'])->middleware("auth")->name("list_product");
    });
});
