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
            'amount' =>  'required|integer'
        ]);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $res = Stripe\Charge::create ([
                "amount" => $req['amount'] * 100,
                "currency" => "aud",
                "source" => $request->stripeToken,
                "description" => "aud lunch order system"
            ]);
            if($res->status == 'succeeded' && $res->paid){
                $transaction = $this->saveTransactions($res);
                $id = $transaction->id;
                $payment = $this->savePaymentDeposits($req, $id);
                $balance = $this->addBalanceToDepositorAccount($req);
            }

            Session::flash('success', 'Payment successful!');

            return back();
        }
        catch (\Stripe\Exception\CardException $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
        catch (\Stripe\Exception\RateLimitException $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
        catch (\Stripe\Exception\InvalidRequestException $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
        catch (\Stripe\Exception\AuthenticationException $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
        catch (\Stripe\Exception\ApiConnectionException $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
        catch (\Stripe\Exception\ApiErrorException $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
        catch (Exception $e)
        {
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
    }
    private function saveTransactions($res){
        $res = $res->toArray();
        $data['brand'] = $res['payment_method_details']['card']['brand'];
        $data['card_last4'] = $res['payment_method_details']['card']['last4'];
        $data['card_exp_month'] = $res['payment_method_details']['card']['exp_month'];
        $data['card_exp_year'] = $res['payment_method_details']['card']['exp_year'];
        $data['amount'] = $res['amount'] / 100;
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
        $depositorBalance = User::findOrFail($req['user_id']);
        $depositorBalance->increment('balance', $req['amount']);
        return $depositorBalance->save();
    }
}
