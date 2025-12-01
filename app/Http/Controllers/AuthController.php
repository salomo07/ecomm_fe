<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        return view('login', []);
    }
    public function unauthorized()
    {
        return view('unauthorized', []);
    }
    public function registerView()
    {
        return view('register', ['registerURL'=>env('API_BASE_URL').'register']);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
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

        // SIMPAN SEMUA DATA KE DALAM SESSION
        session([
            'auth_token' => $data['token'],
            'role'       => $data['role'],
            'name'       => $data['name'],
            'id_user'    => $data['id_user'],
            'email'      => $data['email'],
            'id_address'=>$data['id_address'],
        ]);

        // atau session()->put('key', 'value'); (sama saja)
        // session()->put('auth_token', $data['token']);

        return response()->json($response->json(), $response->status());
    }
}
