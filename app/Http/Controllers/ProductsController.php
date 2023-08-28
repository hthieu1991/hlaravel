<?php

namespace App\Http\Controllers;

use Artisan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    // Default products front page
    function index(){
        $all_product = Products::simplePaginate(8);
        return view('products', compact('all_product'));
    }

    function listProduct(){
        // make sympol links
        // Artisan::call('storage:link'); 
        $productModel = new Products;
        $product_list = $productModel->all();//get() still same
        return view('adm.product_list', compact('product_list'));
    }

    function addProduct(Request $request){

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
        return view('adm.product_add', compact('message'));
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
}
