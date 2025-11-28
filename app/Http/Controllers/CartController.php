<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartData = [
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

        // Kirim ke view "shop" (resources/views/shop.blade.php)
        return view('cart', compact('cartData'));
    }
}
