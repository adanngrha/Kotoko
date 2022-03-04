<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckout() {
        return view('checkout.index', [
        'title' => 'Checkout']);
    }

    public function order() {
        return view('checkout.order', [
            'title' => 'Checkout Succesfully']);
    }
}
