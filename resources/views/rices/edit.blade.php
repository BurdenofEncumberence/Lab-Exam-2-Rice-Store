<!DOCTYPE html>
<html>
<head>
    <title>Edit Rice</title>
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
        <h1>Edit Rice</h1>
    </div>

    <div class="form-card">
        <form action="{{ route('rices.update', $rice) }}" method="POST">
            @csrf @method('PATCH')
            <div class="form-group">
                <label>Rice Name</label>
                <input type="text" name="name" value="{{ $rice->name }}" required>
            </div>
            <div class="form-group">
                <label>Price per kg (₱)</label>
                <input type="number" step="0.01" name="price" value="{{ $rice->price }}" required>
            </div>
            <div class="form-group">
                <label>Stock Amount (kg)</label>
                <input type="number" name="stockAmount" value="{{ $rice->stockAmount }}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">{{ $rice->description }}</textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Rice</button>
                <a href="{{ route('rices.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>