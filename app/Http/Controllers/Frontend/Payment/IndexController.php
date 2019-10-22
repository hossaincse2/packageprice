<?php

namespace App\Http\Controllers\Frontend\Payment;

use App\Http\Controllers\Controller;
use App\Contracts\PackageInterface;
use App\Contracts\OrderInterface;
use App\Contracts\ActivityLogInterface;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Laravel\Cashier\Cashier;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Helper\HelperClass;
use Session;
// use Auth;
use Stripe;

class IndexController extends Controller
{
    private $auth;
    private $package;
    private $orderEloquent;
    private $orderInterface;
    private $activityInterFace;

public function __construct(PackageInterface $package, Order $orderEloquent, OrderInterface $orderInterface, ActivityLogInterface $activityInterFace)
{
    $this->package = $package;
    $this->orderEloquent = $orderEloquent;
    $this->orderInterface = $orderInterface;
    $this->activityInterFace = $activityInterFace;
}
    // public function checkoutStripe(PackageInterface $package){

    //     $package_id = $_GET['package_id'];
    //     $packageDetails = $package->find($package_id);

    //     return view('payment.stripe',['data' => $packageDetails]);

    // }


    public function stripePost(Request $request)
    {
        //dd($request->stripeToken);

        try {

        $packageDetails = $this->package->find($request->package_id);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * $packageDetails->price,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from VoidCoders."
        ]);
        // Order Insert to order table
        $id = '';
        $requestExcept = [
            'order_number' => HelperClass::randomNumber(),
            'payment_method' => 'Stripe',
            'package_id' => $packageDetails->id,
            'query_count' => 0,
            'status' => 'active',
            'user_id' =>  Auth::user()->id,
        ];
        $ArrayByID = "";
        $log_title = "Order Created";
        //dd($this->auth);
        $this->orderEloquent->order_number = HelperClass::randomNumber();
        $this->orderEloquent->payment_method = 'Stripe';
        $this->orderEloquent->package_id = $packageDetails->id;
        $this->orderEloquent->user_id = Auth::user()->id;
        $this->orderEloquent->query_count = 0;
        $this->orderEloquent->status = 'active';

        $data = $this->orderInterface->save($this->orderEloquent);
        $message = "Order Created Successfully!";

        if ($data) {
            $log_type = "audit_log";

            $this->activityInterFace->dataSave($id, $requestExcept, $ArrayByID, $log_title, $log_type);

            Session::flash('success', 'Payment successful!');

            return redirect('payment/success');
        }

    }
    catch (\Exception $e) {
        $dBmessage = $e->getMessage();
        $message = "Something went wrong please try again!";
        $log_type = "error_log";
        $this->activityInterFace->dataSave($id = "", $dBmessage, $ArrayByID = "", $log_title, $log_type);

        $error = \Illuminate\Validation\ValidationException::withMessages([
                    'exception' => [$message]
        ]);
        throw $error;
    }
 }

    public function checkoutPaypal(){
        //echo 'sadd';
        try {
          if(isset($_GET['package_id'])){
            $package_id = $_GET['package_id'];
            $packageDetails = $this->package->find($package_id);

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

             // Order Insert to order table
            $id = '';
            $requestExcept = [
                'order_number' => HelperClass::randomNumber(),
                'payment_method' => 'Stripe',
                'package_id' => $packageDetails->id,
                'query_count' => 0,
                'status' => 'active',
                'user_id' =>  Auth::user()->id,
            ];
            $ArrayByID = "";
            $log_title = "Order Created";
            //dd($this->auth);
            $this->orderEloquent->order_number = HelperClass::randomNumber();
            $this->orderEloquent->payment_method = 'Stripe';
            $this->orderEloquent->package_id = $packageDetails->id;
            $this->orderEloquent->user_id = Auth::user()->id;
            $this->orderEloquent->query_count = 0;
            $this->orderEloquent->status = 'active';

            $data = $this->orderInterface->save($this->orderEloquent);
            $message = "Order Created Successfully!";

             if ($data) {
                $log_type = "audit_log";

                $this->activityInterFace->dataSave($id, $requestExcept, $ArrayByID, $log_title, $log_type);
                 // This will redirect user to PayPal
                echo  $response['paypal_link']; //redirect($response['paypal_link']);
            }
          }
    }
    catch (\Exception $e) {
        $dBmessage = $e->getMessage();
        $message = "Something went wrong please try again!";
        $log_type = "error_log";
        $this->activityInterFace->dataSave($id = "", $dBmessage, $ArrayByID = "", $log_title, $log_type);

        $error = \Illuminate\Validation\ValidationException::withMessages([
                    'exception' => [$message]
        ]);
        throw $error;
    }
}
    public function paymentSuccess(){

        return view('payment.success');
    }


}
