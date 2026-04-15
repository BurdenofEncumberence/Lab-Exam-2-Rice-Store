<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
 
    public function index()
    {
        $payments = Payment::with('order.items.rice')
                            ->latest()
                            ->get();
        return view('payments.index', compact('payments'));
    }

 
    public function markAsPaid(Payment $payment)
    {
        $payment->update([
            'status'  => 'paid',
            'paid_at' => now(),
        ]);

        $payment->order->update(['status' => 'completed']);

        return redirect()->route('payments.index')->with('success', 'Payment marked as paid!');
    }

   
    public function markAsUnpaid(Payment $payment)
    {
        $payment->update([
            'status'  => 'unpaid',
            'paid_at' => null,
        ]);

        $payment->order->update(['status' => 'pending']);

        return redirect()->route('payments.index')->with('success', 'Payment marked as unpaid!');
    }
}