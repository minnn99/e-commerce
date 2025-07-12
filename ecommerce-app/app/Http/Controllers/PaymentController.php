<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Cart;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function createCheckoutSession()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'カートが空です');
        }

        $lineItems = [];
        foreach ($cartItems as $cartItem) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $cartItem->product->name,
                    ],
                    'unit_amount' => $cartItem->product->val,
                ],
                'quantity' => 1,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success', [], true),
            'cancel_url' => route('cart.index', [], true),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        
        // 各カートアイテムを売上として記録
        foreach ($cartItems as $cartItem) {
            Sale::create([
                'product_id' => $cartItem->product_id,
                'user_id' => $user->id,
                'purchase_at' => now(),
            ]);
        }
        
        // カートを空にする
        Cart::where('user_id', $user->id)->delete();
        
        return redirect()->route('payment.complete');
    }
}