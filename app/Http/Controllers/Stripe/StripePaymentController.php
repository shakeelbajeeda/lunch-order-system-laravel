<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\PaymentDeposit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    public function create(){
        $data['users'] = User::all();
        return view('director.payments.depositPayments')->with($data);
    }

    public function stripePost(Request $request)
    {
        $req = $request->validate([
            'user_id' => 'required|integer',
            'amount' =>  'required|integer|min:1',
            'card_last4' =>  'required|min:16|max:16',
            'card_exp_month' =>  'required|min:1|max:2',
            'card_exp_year' =>  'required|min:4|max:4',
            'cvc' =>  'required|integer|min:3',


        ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
                $transaction = $this->saveTransactions($request->all());
                $id = $transaction->id;
                $balance = $this->addBalanceToDepositorAccount($request->all());
                $payment = $this->savePaymentDeposits($req, $id);

            // }

            Session::flash('success', 'Payment deposit successful!');

            return back();
        }
        catch (\Stripe\Exception\CardException $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
        catch (\Stripe\Exception\RateLimitException $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
        catch (\Stripe\Exception\InvalidRequestException $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
        catch (\Stripe\Exception\AuthenticationException $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
        catch (\Stripe\Exception\ApiConnectionException $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
        catch (\Stripe\Exception\ApiErrorException $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
        catch (Exception $e)
        {
            Session::flash('fail-message', $e->getMessage());
            return back();
        }
    }
    private function saveTransactions($res){
        $data = $res;
        $data['brand'] = 'Visa';
        $data['card_last4'] = substr($res['card_last4'], -7);
        return Transaction::create($data);
    }
    private function savePaymentDeposits($req, $id){
        $date = Carbon::now();
        $data['user_id'] = $req['user_id'];
        $data['amount']  = $req['amount'];
        $data['date']  = $date;
        $data['payment_method'] = 'Stripe';
        $data['transaction_id'] = $id;
        return PaymentDeposit::create($data);
    }
    private function addBalanceToDepositorAccount($req)
    {
        $user = User::findOrFail($req['user_id']);
        $user->balance += $req['amount'];
        $user->save();
    }
}
