<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'index'])->name('home_page');

// Show Products Page
Route::get('/products', [ProductsController::class, 'index'])->name("products_page");
Route::post('/products', [ProductsController::class, 'add_product_to_cart'])->name('products_cart');
Route::get('/cart', [ProductsController::class, 'show_cart'])->name('cart');
Route::post('/cart', [ProductsController::class, 'update_cart'])->name('update_cart');


// Show About Page
Route::get('/about', function () {
    return view('about');
});

// Show Profile Page with check if login or not
Route::get('/profile', [UsersController::class, 'profileUser'])->middleware("auth")->name('profile_page');

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

    Route::get('/', [AdminPageController::class, 'index'])->middleware("auth")->name("admin_home");

    //Products Group
    Route::prefix('products')->group(function(){

        Route::get("add_product", function(){
            return view("adm.product_add");
        })->middleware("auth")->name("add_product");

        Route::post("add_product", [ProductsController::class, 'addProduct'])->middleware("auth");

        Route::get("list_product", [ProductsController::class, 'listProduct'])->middleware("auth")->name("list_product");

        Route::post("delete_product", [ProductsController::class, 'deleteProduct'])->name('delete_product');

        Route::post("delete_products", [ProductsController::class, 'delete_products'])->name('delete_products');
    });
});
