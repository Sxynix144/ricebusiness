<!DOCTYPE html>
<html>
<head>
    <title>Rice Menu - Rice Business</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="container-header">
            <h2>Rice Menu Management</h2>
            <p>Add, edit or remove rice products</p>
        </div>
        <div class="content">
            <a href="{{ route('rices.create') }}" class="btn btn-success" style="margin-bottom: 20px;">+ Add New Rice</a>
            <a href="{{ route('dashboard') }}" class="btn btn-outline" style="margin-bottom: 20px; margin-left: 10px;">← Dashboard</a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr><th>Name</th><th>Price/Kg</th><th>Stock (kg)</th><th>Description</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                        @foreach($rices as $rice)
                        <tr>
                            <td>{{ $rice->name }}</td>
                            <td>Php: {{ number_format($rice->price_per_kg, 2) }}</td>
                            <td>{{ $rice->stock_quantity }}</td>
                            <td>{{ $rice->description }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('rices.edit', $rice) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('rices.destroy', $rice) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this rice?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>