<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::with('items.rice', 'payment')
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->get();
        return view('orders.index', compact('orders'));
    }

 
    public function create()
    {
        $rices = Rice::all();
        return view('orders.create', compact('rices'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'items'           => 'required|array|min:1',
            'items.*.rice_id' => 'required|exists:rices,id',
            'items.*.quantity'=> 'required|numeric|min:0.1',
        ]);

        $total = 0;
        $orderItems = [];

        foreach ($request->items as $item) {
            $rice     = Rice::findOrFail($item['rice_id']);
            $itemTotal = $rice->price * $item['quantity'];
            $total    += $itemTotal;

            $orderItems[] = [
                'rice_id'  => $rice->id,
                'quantity' => $item['quantity'],
                'price'    => $rice->price,
                'total'    => $itemTotal,
            ];
        }

        $order = Order::create([
            'user_id'      => Auth::id(),
            'total_amount' => $total,
            'status'       => 'pending',
        ]);

        $order->items()->createMany($orderItems);

       
        $order->payment()->create([
            'amount_paid' => $total,
            'status'      => 'unpaid',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

   
    public function show(Order $order)
    {
        $order->load('items.rice', 'payment');
        return view('orders.show', compact('order'));
    }

  
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}