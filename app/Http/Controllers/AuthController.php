<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
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
        // echo json_encode($data);
        // SIMPAN SEMUA DATA KE DALAM SESSION
        session([
            'auth_token' => $data['token'],
            'role'       => $data['role'],
            'name'       => $data['name'],
            'id_user'    => $data['id_user'],
            'email'      => $data['email'],
            'address_name'=>$data['address_name'],
            'address_detail'=>$data['address_detail'],
            'address_id'=>$data['address_id'],
        ]);

        // atau session()->put('key', 'value'); (sama saja)
        // session()->put('auth_token', $data['token']);

        return response()->json($response->json(), $response->status());
    }
}
