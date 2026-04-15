<!DOCTYPE html>
<html>
<head>
    <title>Rice Menu</title>
    @include('layouts.app-style')
</head>
<body>

<nav class="navbar">
    <span class="brand">Rice Store</span>
    <a href="{{ route('rices.index') }}">Rice Menu</a>
    <a href="{{ route('orders.index') }}">Orders</a>
    <a href="{{ route('payments.index') }}">Payments</a>
</nav>

<div class="container">
    <div class="page-header">
        <h1>Rice Menu</h1>
        <a href="{{ route('rices.create') }}" class="btn btn-primary">+ Add Rice</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price/kg</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rices as $rice)
                <tr>
                    <td><strong>{{ $rice->name }}</strong></td>
                    <td>₱{{ number_format($rice->price, 2) }}</td>
                    <td>{{ $rice->stockAmount }} kg</td>
                    <td>{{ $rice->description ?? '—' }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('rices.edit', $rice) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rices.destroy', $rice) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Delete this rice?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5"><div class="empty-state">No rice products yet.</div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>