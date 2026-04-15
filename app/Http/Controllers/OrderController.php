<?php

namespace App\Http\Controllers;

use App\Models\RiceItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // DELETE the __construct method

    public function create()
    {
        $rices = RiceItem::all();
        return view('orders.create', compact('rices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rice_item_id' => 'required|exists:rice_items,id',
            'quantity_kg' => 'required|integer|min:1'
        ]);

        $rice = RiceItem::findOrFail($request->rice_item_id);
        $total = $rice->price_per_kg * $request->quantity_kg;

        $order = Order::create([
            'user_id' => Auth::id(),
            'rice_item_id' => $rice->id,
            'quantity_kg' => $request->quantity_kg,
            'total_price' => $total,
            'payment_status' => 'unpaid'
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Order created. Please proceed to payment.');
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);
        return view('orders.show', compact('order'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('riceItem')->get();
        return view('orders.index', compact('orders'));
    }
}