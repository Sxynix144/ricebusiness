<!DOCTYPE html>
<html>
<head><title>Payment History</title><link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style> table { width:100%; ... } </style>
</head>
<body>
<div style="max-width:1000px; margin:40px auto; background:white; padding:30px; border-radius:16px;">
    <h2>Payment History</h2>
    <table>
        <thead><tr><th>Order #</th><th>Rice</th><th>Amount Paid</th><th>Date</th></tr></thead>
        <tbody>
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->order_id }}</td>
            <td>{{ $payment->order->riceItem->name }}</td>
            <td>${{ number_format($payment->amount_paid,2) }}</td>
            <td>{{ $payment->payment_date }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</div>
</body>
</html>