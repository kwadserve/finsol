<?php
namespace App\Http\Controllers\User;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public $payment_type;
    public function __construct()
    {
        $this->payment_type = '';
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data['payment_history'] = PaymentDetail::orderBy('id', 'DESC')->get();

        return view('user.pages.payments.history')->with($data);
    }
}