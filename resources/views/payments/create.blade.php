<!DOCTYPE html>
<html>
<head><title>Process Payment</title><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<body>
<div style="max-width:600px; margin:40px auto; background:white; padding:30px; border-radius:16px;">
    <h2>Process Payment for Order #{{ $order->id }}</h2>
    <p>Total due: <strong>${{ number_format($order->total_price,2) }}</strong></p>
    <form method="POST" action="{{ route('payments.store', $order) }}">
        @csrf
        <input type="number" step="0.01" name="amount_paid" placeholder="Amount paid" required><br>
        <button type="submit">Confirm Payment</button>
    </form>
</div>
</body>
</html>