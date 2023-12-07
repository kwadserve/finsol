<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instamojo;
use App\Models\PaymentValue;
use App\Models\Documents;
use App\Models\User;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userPaymentDetails($userId)
    {
        $data['user'] = User::where('id', $userId)->first();
        $data['transaction'] = Instamojo::select('*')->where('user_id', $userId)->orderBy('updated_at', 'DESC')->get();
        return view('admin.pages.users.payment')->with($data);
    }

    public function allTransactions()
    {
        $data['transaction'] = Instamojo::select('*')->orderBy('updated_at', 'DESC')->get();
        return view('admin.pages.payment.history.transactions')->with($data);
    }

    public function updateFormValue(Request $request)
    {
        $form = PaymentValue::where('id', $request->id)->update([
            'value' => $request->value,
        ]);

        return $form;
    }

    public function showFormValue()
    {
        $data['values'] = PaymentValue::select('*')->orderBy('updated_at', 'DESC')->get();
        // $documents = Documents::select('*')->get();
        // $pre = 'a';
        // foreach($documents as $doc)
        // {
        //     $type = $doc->gst_type_val;
        //     if($type != $pre)
        //     {
        //         $pre = $type;
        //         $forms = PaymentValue::firstOrCreate([
        //             'form_type' => $doc->for_multiple
        //         ],[
        //             'form' => $doc->for_multiple,
        //             'value' => 80,
        //         ]);
        //     }
        // }
        return view('admin.pages.payment.formValue.list')->with($data);
    }
}