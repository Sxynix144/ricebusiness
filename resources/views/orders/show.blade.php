<!DOCTYPE html>
<html>
<head><title>Order Details</title><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<body>
<div style="max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 16px;">
    <h2>Order #{{ $order->id }}</h2>
    <p><strong>Rice:</strong> {{ $order->riceItem->name }}</p>
    <p><strong>Quantity:</strong> {{ $order->quantity_kg }} kg</p>
    <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
    <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>

    @if($order->payment_status == 'unpaid')
        <a href="{{ route('payments.create', $order) }}" class="btn btn-add">Process Payment</a>
    @else
        <p style="color:green;">✓ Paid</p>
    @endif
    <a href="{{ route('orders.index') }}">View All Orders</a>
</div>
</body>
</html>