<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.my_profile');
    }

    public function address()
    {
        $token = session('auth_token');
        $response = Http::withToken($token)
        ->get(env('API_BASE_URL') . 'shipping-address?user_id='.session('id_user'));
        if (!$response->successful()) {
            return response()->json($response->json(), $response->status());
        }
        $data = $response->json()['data'];
        return view('profile.address_list',['addresses'=>$data,'token'=>session('auth_token')]);
    }
}
