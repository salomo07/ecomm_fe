<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $token = Cookie::get('role');
        $shopData = [
            "productcategory" => [
                [
                    "id"   => "cat-001",
                    "name" => "Buah Segar",
                    "desc" => "Kategori untuk buah segar dan natural",
                ],
                [
                    "id"   => "cat-002",
                    "name" => "Sayuran",
                    "desc" => "Sayuran organik dan hidroponik",
                ],
                [
                    "id"   => "cat-003",
                    "name" => "Online",
                    "desc" => "Sayuran organik dan hidroponik",
                ],
            ],
            "product" => [
                [
                    "id"         => "prod-001",
                    "idseller"   => "seller-001",
                    "idcategory" => "cat-001",
                    "categoryname" => "Buah Segar",
                    "name"       => "Apel Fuji Premium",
                    "desc"       => "Apel Fuji manis impor kualitas premium",
                    "sku"        => "FUJI-APL-001",
                ],
            ]
        ];

        if (request()->has('id')) {
            $productId = request()->get('id');
            return view('shop-detail', [
                'productDetailURL' => env('API_BASE_URL') . 'general-product-detail/' . $productId,"storageURL"=>"http://192.168.99.19:8000/storage/"
            ]);
        }
        return view('shop', ['productURL'=>env('API_BASE_URL').'general-products','shopData'=>$shopData]);
    }
}
