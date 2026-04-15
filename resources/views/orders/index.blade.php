<!DOCTYPE html>
<html>
<head><title>My Orders</title><link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style> table { width:100%; ... } </style>
</head>
<body>
<div style="max-width:1000px; margin:40px auto; background:white; padding:30px; border-radius:16px;">
    <h2>My Orders</h2>
   
    <a href="{{ route('rices.create') }}" class="btn btn-success" style="margin-bottom: 20px;">+ Add New Order</a>
            <a href="{{ route('dashboard') }}" class="btn btn-outline" style="margin-bottom: 20px; margin-left: 10px;">← Dashboard</a>
    <table>
        
        <thead><tr><th>ID</th><th>Rice</th><th>Qty</th><th>Total</th><th>Status</th><th>Action</th></tr></thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->riceItem->name }}</td>
            <td>{{ $order->quantity_kg }} kg</td>
            <td>Php{{ number_format($order->total_price,2) }}</td>
            <td>{{ ucfirst($order->payment_status) }}</td>
            <td><a href="{{ route('orders.show', $order) }}">View</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    
</div>
</body>
</html>