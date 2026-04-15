<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
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
        <h1>Payment History</h1>
    </div>

    @if (session('success'))
        @php
            $isUnpaid = str_contains(session('success'), 'unpaid');
        @endphp
        <div class="alert {{ $isUnpaid ? 'alert-danger' : 'alert-success' }}">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Items</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Paid At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                <tr>
                    <td><strong>#{{ $payment->order->id }}</strong></td>
                    <td>
                        @foreach ($payment->order->items as $item)
                            {{ $item->rice->name }} ({{ $item->quantity }}kg)<br>
                        @endforeach
                    </td>
                    <td>₱{{ number_format($payment->amount_paid, 2) }}</td>
                    <td><span class="badge badge-{{ $payment->status }}">{{ ucfirst($payment->status) }}</span></td>
                    <td>{{ $payment->paid_at ? $payment->paid_at->format('M d, Y h:i A') : '—' }}</td>
                    <td style="display:flex; gap:8px; align-items:center;">
                        @if ($payment->status === 'unpaid')
                            <form action="{{ route('payments.markAsPaid', $payment) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-success">Mark as Paid</button>
                            </form>
                        @else
                            <form action="{{ route('payments.markAsUnpaid', $payment) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-danger">Mark as Unpaid</button>
                            </form>
                        @endif
                        <a href="{{ route('orders.show', $payment->order) }}" class="btn btn-ghost">View Order</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6"><div class="empty-state">No payment records yet.</div></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>