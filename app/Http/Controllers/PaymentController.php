<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    // DELETE the __construct method

    public function create(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);
        if ($order->payment_status == 'paid') {
            return redirect()->route('orders.show', $order)->with('error', 'Already paid.');
        }
        return view('payments.create', compact('order'));
    }

    public function store(Request $request, Order $order)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:'.$order->total_price
        ]);

        Payment::create([
            'order_id' => $order->id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => Carbon::now()
        ]);

        $order->update(['payment_status' => 'paid']);

        return redirect()->route('orders.show', $order)->with('success', 'Payment recorded. Order is now paid.');
    }

    public function history()
    {
        $payments = Payment::whereHas('order', function($q) {
            $q->where('user_id', Auth::id());
        })->with('order.riceItem')->get();
        return view('payments.history', compact('payments'));
    }
}