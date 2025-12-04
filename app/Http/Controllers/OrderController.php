<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;

class OrderController extends Controller
{
    public function index()
    {
        return view('checkout', ['address_detail'=>session('address_detail')]);
    }
    public function generateQR(Request $request){
        $payload = $request->only(['idorder']);
    }
    public function orders(Request $request){
        if (request()->has('id')) {
            $orderId = request()->get('id');
            $response = Http::get(env('API_BASE_URL') . 'order?id_order='.$orderId);
            $invoice = $response->json()['data'] ?? null;

            if (!$invoice) {
                return back()->with('error', 'Invoice tidak ditemukan');
            }
            // Mail::to(session('email'))->send(new InvoiceEmail($invoice));
            return view('detailorder', []);
        }
        return view('orders', []);
    }
}