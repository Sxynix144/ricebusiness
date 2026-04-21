<!DOCTYPE html>
<html>
<head><title>New Order - Rice Business</title><link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script>
function computeTotal() {
    let riceSelect = document.getElementById('rice_item_id');
    let price = riceSelect.options[riceSelect.selectedIndex].getAttribute('data-price');
    let qty = document.getElementById('quantity_kg').value;
    let total = (price * qty).toFixed(2);
    document.getElementById('total_display').innerHTML = total ? `Total: Php: ${total}` : '';
}
</script>
</head>
<body>
<div style="max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 16px;">
    <h2>Create New Order</h2>
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <select name="rice_item_id" id="rice_item_id" required onchange="computeTotal()">
            <option value="">Select Rice</option>
            @foreach($rices as $rice)
                <option value="{{ $rice->id }}" data-price="{{ $rice->price_per_kg }}">
                    {{ $rice->name }} - Php:{{ $rice->price_per_kg }}/kg (Stock: {{ $rice->stock_quantity }}kg)
                </option>
            @endforeach
        </select><br>
        <input type="number" name="quantity_kg" id="quantity_kg" placeholder="Quantity (kg)" required onkeyup="computeTotal()"><br>
        <p id="total_display"></p>
        <button type="submit">Place Order</button>
    </form>
    <a href="{{ route('dashboard') }}">Cancel</a>
</div>
</body>
</html>