<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderController extends Controller
{
    public function index()
    {
        return view('checkout', []);
    }
    public function generateQR(Request $request){
        $payload = $request->only(['idorder']);
    }
}