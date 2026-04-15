<!DOCTYPE html>
<html>
<head>
    <title>Order #{{ $order->id }}</title>
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
        <h1>Order #{{ $order->id }}</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-ghost">← Back</a>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

        <div class="card" style="padding:24px;">
            <h2 style="margin-bottom:16px; font-size:16px; color:#888; text-transform:uppercase; letter-spacing:0.5px;">Order Info</h2>
            <p style="margin-bottom:10px;"><strong>Status:</strong> <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span></p>
            <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}</p>
        </div>

        <div class="card" style="padding:24px;">
            <h2 style="margin-bottom:16px; font-size:16px; color:#888; text-transform:uppercase; letter-spacing:0.5px;">Payment Info</h2>
            @if ($order->payment)
                <p style="margin-bottom:10px;"><strong>Status:</strong> <span class="badge badge-{{ $order->payment->status }}">{{ ucfirst($order->payment->status) }}</span></p>
                <p style="margin-bottom:10px;"><strong>Amount:</strong> ₱{{ number_format($order->payment->amount_paid, 2) }}</p>
                @if ($order->payment->paid_at)
                    <p><strong>Paid At:</strong> {{ $order->payment->paid_at->format('M d, Y h:i A') }}</p>
                @endif
            @else
                <p style="color:#aaa">No payment record.</p>
            @endif
        </div>
    </div>

    <br>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Rice</th>
                    <th>Price/kg</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td><strong>{{ $item->rice->name }}</strong></td>
                    <td>₱{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }} kg</td>
                    <td>₱{{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" style="text-align:right;"><strong>Total Amount</strong></td>
                    <td><strong>₱{{ number_format($order->total_amount, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>