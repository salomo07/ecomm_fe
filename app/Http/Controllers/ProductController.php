<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (request()->has('id')) {
            $productId = request()->get('id');
            return view('product-detail', [
                'productDetailURL' => env('API_BASE_URL') . 'products/' . $productId,'token'=>session('auth_token')
            ]);
        }

        return view('product',['productURL'=>env('API_BASE_URL').'products','token'=>session('auth_token')]);
    }

    public function store(Request $request)
    {
        return view('store',['productURL'=>env('API_BASE_URL').'products','token'=>session('auth_token')]);
    }
}
