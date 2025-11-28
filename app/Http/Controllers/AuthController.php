<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
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
    public function loginView()
    {
        return view('login', ['loginURL'=>'/login']);
    }
    public function registerView()
    {
        return view('register', ['registerURL'=>'/register']);
    }
    public function registerProxy(Request $request)
    {
        dd($request->all());
        $payload = $request->only([
            'name',
            'email',
            'password',
            'role'
        ]);
        $response = Http::post(env('API_BASE_URL') . 'register', $payload);
        // $response = Http::post(env('API_BASE_URL') . 'register', $payload);
        // if (!$response->successful()) {
        //     return response()->json($response->json(), $response->status());
        // }

        // return $response->json();
    }
    public function logout()
    {
        Cookie::queue(Cookie::forget('auth_token'));
        Cookie::queue(Cookie::forget('role'));
        return redirect('/login');
    }
    public function loginProxy(Request $request)
    {
        $payload = $request->only(['email', 'password']);
        $response = Http::post(env('API_BASE_URL') . 'login', $payload);
        if (!$response->successful()) {
            return response()->json($response->json(), $response->status());
        }

        $data = $response->json()['data'];
        // Cookie::queue('auth_token', $data['token'], 60 * 24 * 7);
        Cookie::queue(
            Cookie::make(
                'auth_token',
                $data['token'],
                60 * 24 * 7,
                '/',
                'localhost', // domain Web A
                true,
                true,
                false,
                'Strict'
            )
        );
        Cookie::queue(
            Cookie::make(
                'role',
                $data['role'],
                60 * 24 * 7,
                '/',
                'localhost', // domain Web A
                true,
                true,
                false,
                'Strict'
            )
        );
        // Cookie::queue('role', $data['role'], 60 * 24 * 7);
        return response()->json($response->json(), $response->status());
    }
}
