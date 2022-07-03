<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class PaymentReceivedController extends Controller
{
    public function index()
    {
        $admission = Admission::all();

        return view('admin.payment.payment-received-view', compact('admission'));
    }
}
