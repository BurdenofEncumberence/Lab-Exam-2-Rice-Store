<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
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
        <h1>Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">+ New Order</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td><strong>#{{ $order->id }}</strong></td>
                    <td>
                        @foreach ($order->items as $item)
                            <span>{{ $item->rice->name }} ({{ $item->quantity }}kg)</span><br>
                        @endforeach
                    </td>
                    <td>₱{{ number_format($order->total_amount, 2) }}</td>
                    <td><span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                    <td>
                        @if ($order->payment)
                            <span class="badge badge-{{ $order->payment->status }}">{{ ucfirst($order->payment->status) }}</span>
                        @else
                            <span style="color:#aaa">—</span>
                        @endif
                    </td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-ghost">View</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7"><div class="empty-state">No orders yet.</div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>