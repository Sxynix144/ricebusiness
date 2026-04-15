<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Rice Business</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="container-header">
            <h2>Rice Business Dashboard</h2>
            <p>Welcome, {{ Auth::user()->name }}!</p>
        </div>
        <div class="content">
            <div class="dashboard-grid">
                <a href="{{ route('rices.index') }}" class="dashboard-card">
                    <h3>🍚 Rice Menu</h3>
                    <p>Manage rice products</p>
                </a>
                <a href="{{ route('orders.create') }}" class="dashboard-card">
                    <h3>🛒 New Order</h3>
                    <p>Create customer order</p>
                </a>
                <a href="{{ route('orders.index') }}" class="dashboard-card">
                    <h3>📋 Orders</h3>
                    <p>View all orders</p>
                </a>
                <a href="{{ route('payments.history') }}" class="dashboard-card">
                    <h3>💵 Payments</h3>
                    <p>Payment history</p>
                </a>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin-top: 40px;">
                @csrf
                <button type="submit" class="btn-outline">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>