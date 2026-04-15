<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
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
        <h1>Create New Order</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="form-card" style="max-width:700px;">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div id="items-container">
                <div class="item-row">
                    <div class="form-group" style="margin:0">
                        <label>Rice</label>
                        <select name="items[0][rice_id]" required>
                            <option value="">-- Select Rice --</option>
                            @foreach ($rices as $rice)
                                <option value="{{ $rice->id }}">{{ $rice->name }} — ₱{{ number_format($rice->price, 2) }}/kg</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="margin:0">
                        <label>Quantity (kg)</label>
                        <input type="number" step="0.01" min="0.1" name="items[0][quantity]" placeholder="0.00" required>
                    </div>
                    <div></div>
                </div>
            </div>

            <button type="button" onclick="addItem()" class="btn btn-ghost" style="margin-top:4px;">+ Add Another Rice</button>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Place Order</button>
                <a href="{{ route('orders.index') }}" class="btn btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    let index = 1;
    function addItem() {
        const container = document.getElementById('items-container');
        const rices = @json($rices);
        let options = '<option value="">-- Select Rice --</option>';
        rices.forEach(r => {
            options += `<option value="${r.id}">${r.name} — ₱${parseFloat(r.price).toFixed(2)}/kg</option>`;
        });
        const div = document.createElement('div');
        div.classList.add('item-row');
        div.innerHTML = `
            <div class="form-group" style="margin:0">
                <label>Rice</label>
                <select name="items[${index}][rice_id]" required>${options}</select>
            </div>
            <div class="form-group" style="margin:0">
                <label>Quantity (kg)</label>
                <input type="number" step="0.01" min="0.1" name="items[${index}][quantity]" placeholder="0.00" required>
            </div>
            <button type="button" onclick="this.closest('.item-row').remove()" class="btn btn-danger" style="height:40px;">✕</button>
        `;
        container.appendChild(div);
        index++;
    }
</script>

</body>
</html>