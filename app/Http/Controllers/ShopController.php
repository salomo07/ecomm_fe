<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if (request()->has('id')) {
            $productId = request()->get('id');
            return view('shop-detail', [
                'productDetailURL' => env('API_BASE_URL') . 'general-product-detail/' . $productId,"sendCartURL"=>env('API_BASE_URL').'cart',
            ]);
        }
        return view('shop', ['productURL'=>env('API_BASE_URL').'general-products','cat'=>request()->get('cat'),'keyword'=>urldecode(request()->get('keyword'))]);
    }
}
