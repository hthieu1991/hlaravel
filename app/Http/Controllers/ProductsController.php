<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    function listProduct(){
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

        $productModel = new Products;
        $productModel->p_name = $p_name;
        $productModel->p_desc = $p_desc;
        $productModel->p_price = $p_price;
        $productModel->p_total = $p_total;
        $productModel->p_status = $p_status;
        $productModel->p_img = $img_name;
        $productModel->save();

        $message = "Successful";
        return view('adm.product_add', compact('message'));
    }
}
