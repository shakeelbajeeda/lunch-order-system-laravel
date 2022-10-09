<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Models\PaymentDeposit;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function deposit(StorePaymentRequest $request)
    {
        $validated = $request->all();
        $transaction = $this->save_transaction($validated);
        $id = $transaction->id;
        $payment = $this->save_payment_deposit($validated, $id);
        $balance = $this->add_balance_to_depositor_account($validated);
        return redirect()->back()->with('message', 'Payment deposit successfully');

    }

    private function save_transaction($req)
    {
      $data['amount'] = $req['amount'];
      $data['card_last4'] = substr($req['card_number'], -4);
      $data['card_exp_month'] = $req['month'];
      $data['card_exp_year'] = $req['year'];
      return Transaction::create($data);
    }

    private function save_payment_deposit($req, $id)
    {
        $data['user_id'] = auth()->user()->id;
        $data['amount'] = $req['amount'];
        $data['payment_method'] = 'Stripe';
        $data['transaction_id'] = $id;
        return PaymentDeposit::create($data);
    }

    private function add_balance_to_depositor_account($req)
    {
        $user = auth()->user();
        $user->balance += $req['amount'];
        $user->save();
    }
}


