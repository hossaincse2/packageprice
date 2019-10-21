<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use App\Contracts\PackageInterface;
use App\Contracts\OrderInterface;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Laravel\Cashier\Cashier;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Stripe;

class IndexController extends Controller
{
    private $auth;
    // public function checkoutStripe(PackageInterface $package){

    //     $package_id = $_GET['package_id'];
    //     $packageDetails = $package->find($package_id);

    //     return view('payment.stripe',['data' => $packageDetails]);

    // }


    public function stripePost(Request $request, PackageInterface $package, OrderInterface $order)
    {
        //dd($request->stripeToken);

         $packageDetails = $package->find($request->package_id);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $packageDetails->price,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from VoidCoders."
        ]);

        $orderData = [

        ];
        $userId = $this->auth->user()->id;

       // $order->save();

        Session::flash('success', 'Payment successful!');

        return redirect('payment/success');
    }

    public function checkoutPaypal(PackageInterface $package, OrderInterface $order){

        $package_id = $_GET['package_id'];
        $packageDetails = $package->find($package_id);
        $data = [];
        $data['items'] = [
            [
                'name' => $packageDetails->name,
                'type' => $packageDetails->type,
                'query_limit' => $packageDetails->query_limit,
                'price' => $packageDetails->price,
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['total'] = $packageDetails->price;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');


            $provider = new ExpressCheckout;      // To use express checkout.
           //dd($packageDetails);
           $provider->setCurrency('USD')->setExpressCheckout($data);
           $response = $provider->setExpressCheckout($data);

         // Use the following line when creating recurring payment profiles (subscriptions)
         $response = $provider->setExpressCheckout($data, true);

         // This will redirect user to PayPal
      echo  $response['paypal_link']; //redirect($response['paypal_link']);

    }
    public function paymentSuccess(){

        return view('payment.success');
    }
}
