<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $storeId = request()->get('id');
        $response = Http::get(env('API_BASE_URL') . 'store/'.$storeId);
        if (!$response->successful()) {
            return response()->json($response->json(), $response->status());
        }
        $data = $response->json()['data'];
        return view('store',['token'=>session('auth_token'),'dataStore'=>$data]);
    }
}
