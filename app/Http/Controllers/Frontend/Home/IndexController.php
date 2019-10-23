<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\PackageInterface;
use App\Contracts\PackageQueryInterface;
use App\Contracts\OrderInterface;
use App\Contracts\ActivityLogInterface;
use App\Models\Order;
use App\Models\UserPackageQuery;
use App\Helper\HelperClass;
use Session;
use DB;

class IndexController extends Controller
{
    public function index(PackageInterface $package){

        return view('welcome',[ 'data' => $package->findAll()]);
    }

    public function package(PackageInterface $package){

        return view('package',[ 'data' => $package->findAll()]);
    }

    public function whois(PackageInterface $package){

        return view('whois',[ 'data' => $package->findAll()]);
    }

    public function domainSearch(PackageInterface $package, OrderInterface $orderInterface, Order $orderEloquent, ActivityLogInterface $activityInterFace, PackageQueryInterface $packageQueryInterface, UserPackageQuery $packageQueryEloquent)
    {

        if(isset($_GET['s'])){

            $domain = $_GET['s']; 
            $api_key = $_GET['api_key']; 
            $auth_token = $_GET['auth_token']; 
           // DB::enableQueryLog();
           // $order = $orderInterface->findBy('api_key', '=' , '');
            $user = DB::table('users')->where('auth_token',  $auth_token)->first();
            $order = $orderEloquent->where('api_key',  $api_key)->where('user_id',  $user->id)->first(); 
            $packageDetails = $package->find($order->package_id);  
            
           // $query = DB::getQueryLog();
            // print_r($query);
            $status = '';
            if(($packageDetails->type == 'fixed' || $packageDetails->type == 'free') && $packageDetails->query_limit >= $order->query_count){
                $status = 'active';   
            }else if($packageDetails->type == 'monthly'){
                $status = 'active';
            }else if($packageDetails->type == 'yearly'){
                $status = 'active';
            }else{
                $status = 'limited';
            }
            // dd($packageDetails->type);

            //Month Wise And Year Wise 
            // if($packageDetails->type == 'monthly' && $order->created_at >= '30 days'){
            //     $status = 'active';
            // }else if($packageDetails->type == 'yearly' && $order->created_at >= '365 days'){
            //     $status = 'active';
            // }else{
            //     $status = 'expired';
            // }
           
            // $data = $orderInterface->update($this->orderEloquent);
            $updated = $orderEloquent->where('api_key', $api_key)->where('user_id', $user->id)->update([
                'query_count' => $order->query_count + 1,
                'status' => $status,
            ]);

            // $myPcIP = getHostByName(getHostName());
            // $clientIPaddress = request()->ip();
            $clientUrl = request()->url();

                try {
                    if($updated){ 
                       // Order Insert to order table
                      $id = '';
                      $requestExcept = [
                          'user_id' => $user->id,
                          'order_id' => $order->id,
                          'package_id' => $packageDetails->id,
                          'query_count' => $order->query_count,
                          'domain_name' => $domain,
                          'ip_address' => HelperClass::macaddress(),
                          'request_url' =>  $clientUrl,
                          'api_key' =>  $order->api_key,
                      ];
                      $ArrayByID = "";
                      $log_title = "Domain Search";

                      $packageQueryEloquent->user_id = $user->id;
                      $packageQueryEloquent->order_id = $order->id;
                      $packageQueryEloquent->package_id = $packageDetails->id;
                      $packageQueryEloquent->query_count = $order->query_count + 1;
                      $packageQueryEloquent->domain_name = $domain;
                      $packageQueryEloquent->ip_address = HelperClass::macaddress();
                      $packageQueryEloquent->request_url = $clientUrl;
                      $packageQueryEloquent->api_key =  $order->api_key;
          
                      $data = $packageQueryInterface->save($packageQueryEloquent);
                      $message = "Domain Search Result Successfully!";
          
                       if ($data) {
                          $log_type = "audit_log";
          
                          $activityInterFace->dataSave($id, $requestExcept, $ArrayByID, $log_title, $log_type);
                           // This will redirect user to PayPal
                          echo  $message; //redirect($response['paypal_link']);
                      }
                    }
                } catch (\Exception $e) {
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
   }
}
