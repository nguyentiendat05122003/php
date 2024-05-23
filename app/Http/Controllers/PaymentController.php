<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $payment;
    private $detail_payment;
    public function __construct()
    {
        $this->payment = new Payment();
    }
    function index()
    {
        $payments = $this->payment->getAllPayment();
        return view('admin.payment.index', compact('payments'));
    }
    function edit($id)
    {
        $payments = $this->payment->getPaymentById($id);
        return view('admin.payment.edit', compact('payments', 'id'));
    }
    function postEdit(Request $req, $id)
    {
        $this->payment->updatePayment($id, ['paid' => 1]);
        return redirect()->route('payment.index')->with('msg', 'paid for payment success');
    }
}
