<!DOCTYPE html>
<html>
<head><title>Add Rice - Rice Business</title><link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<body>
<div style="max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 16px;">
    <h2>Add New Rice Product</h2>
    <form method="POST" action="{{ route('rices.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Rice name (e.g., Jasmine)" required><br>
        <input type="number" step="0.01" name="price_per_kg" placeholder="Price per kg" required><br>
        <input type="number" name="stock_quantity" placeholder="Stock quantity (kg)" required><br>
        <textarea name="description" placeholder="Description (optional)" rows="3"></textarea><br>
        <button type="submit">Save Rice</button>
    </form>
    <a href="{{ route('rices.index') }}">Back to List</a>
</div>
</body>
</html>