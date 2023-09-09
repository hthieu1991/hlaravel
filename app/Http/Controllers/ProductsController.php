<?php

namespace App\Http\Controllers;

use Artisan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    function __construct(){
        // make sympol links
        // Artisan::call('storage:link');
    }
    // Default products front page
    function index(){
        $all_product = Products::simplePaginate(8);
        return view('products', compact('all_product'));
    }

    function listProduct(Request $request){
        $productModel = new Products;
        $product_list = $productModel->all();//get() still same
        return view('adm.product_list', compact('product_list'));
    }

    function addProduct(Request $request){
        $request->flash();
        $rules = [
            'p_name' => 'required|string|min:5|max:100',
            'p_desc' => 'required|string|min:5|max:200',
            'p_price' => 'required',
            'p_total' => 'required|integer',
            'p_status' => 'required|integer',
            'p_img' => 'required'
        ];

        $data = $request->validate($rules);

        $p_name = $request->input('p_name');
        $p_desc = $request->input('p_desc');
        $p_price = $request->input('p_price');
        $p_total = $request->input('p_total');
        $p_status = $request->input('p_status');
        // process upload images
        $p_img = $request->file('p_img');
        $img_name = $p_img->getClientOriginalName();
        $p_img->storeAs('public/uploads', $img_name);//remember save image into storage/public/uploads



        // make insert 10 products for test

        for($i = 1; $i<=10; $i++) {
            $productModel = new Products;
            $productModel->p_name = $p_name."-".$i;
            $productModel->p_desc = $p_desc;
            $productModel->p_price = $p_price;
            $productModel->p_total = $p_total;
            $productModel->p_status = $p_status;
            $productModel->p_img = $img_name;
            $productModel->save();
        }



        $message = "Successful";
        // if(!$request->old()) {
            return view('adm.product_add', compact('message'));
        // } else {
        //     $old = $request->old();
        //     return view('adm.product_add', compact('message'));
        // }

    }

    function updateProduct(Request $request){

    }

    // Delete product using ajax
    function deleteProduct(Request $request){
        $p_id = $request->p_id;
        // Delete using Eloquent
        $deleted = Products::where("id",$p_id)->delete();

        return $deleted;

        // Delete using Eloquen 2
        // $product = Products::find($p_id);
        // $product->delete();

        // Delete using Query Builder
        // DB::table("products")->delete($p_id);

        // $this->listProduct();
    }

    function add_product_to_cart(Request $request){
        // session()->forget('cart');
        $product_id = $request->p_id;
        $price = 0;
        $total = 0;



        $cart = session()->get('cart', []);
        if(isset($cart[$product_id])) {
            $cart[$product_id]['p_total'] += $cart[$product_id]['p_total'];
            $cart[$product_id]['p_price'] += $cart[$product_id]['p_price'];
        } else {
            $data = DB::table('products')
            ->select('id', 'p_name', 'p_price', 'p_desc', 'p_status', 'p_total', 'p_img')
            ->where('id', '=', $product_id)
            ->get();

            foreach($data as $product) {
                $cart[$product_id] = [
                    'p_name' => $product->p_name,
                    'p_price' => $product->p_price,
                    'p_desc' => $product->p_desc,
                    'p_status' => $product->p_status,
                    'p_total' => $product->p_total,
                    'p_img' => $product->p_img
                ];

            }
        }

        session()->put('cart', $cart);
        // print_r(session()->get('cart'));
        return 'Add to cart success';
    }

    function update_cart(){
        $id = request()->id;
        $p_total = request()->p_total;

        $cart = session()->get('cart');
        $cart[$id]['p_total'] = $p_total;

        session()->put('cart', $cart);
    }

    function show_cart(){
        return view('cart');
    }
}
