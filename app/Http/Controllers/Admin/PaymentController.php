<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instamojo;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userPaymentDetails($userId)
    {
        $data['transaction'] = Instamojo::select('*')->where('user_id', $userId)->orderBy('updated_at', 'DESC')->get();
        return view('admin.pages.users.payment')->with($data);
    }

    public function allTransactions()
    {
        $data['transaction'] = Instamojo::select('*')->orderBy('updated_at', 'DESC')->get();
        return view('admin.pages.payment.history.transactions')->with($data);
    }

    public function formValue(Request $request)
    {}
}
