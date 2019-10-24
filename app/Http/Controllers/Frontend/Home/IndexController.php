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
use Config;
use Validator;
use Rule;
use Response;

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

    public function domainSearch(Request $request,PackageInterface $package, OrderInterface $orderInterface, Order $orderEloquent, ActivityLogInterface $activityInterFace, PackageQueryInterface $packageQueryInterface, UserPackageQuery $packageQueryEloquent)
    {
        $input = $request->all();
       // dd($input);
        if(isset($input)){

            $domain =  $input['s'];
            $api_key = base64_decode($input['api_key']); 
            $auth_token = base64_decode($input['auth_token']); 
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
                           // Lookup Domain
                           $whois =  config('enums.whoisservers');
                                // Validator::extend('domain', function ($attribute, $value, $parameters, $validator) {
                                //     preg_match("/[^\.\/]+\.[^\.\/]+$/", $value, $matches);
                                //     return count($matches);
                                // });
                                // Validator::extend('extension', function ($attribute, $value, $parameters, $validator) use ($whois) {
                                //     $pathinfo = pathinfo($value);
                                //     $extension = isset($pathinfo['extension']) ? $pathinfo['extension'] : false;
                                //     return in_array($extension, array_keys($whois));
                                // });
                                // $reCAPTCHA = file_get_contents(
                                //     'https://www.google.com/recaptcha/api/siteverify',
                                //     false,
                                //     stream_context_create(
                                //         ['http' =>
                                //             [
                                //                 'method'  => 'POST',
                                //                 'header'  => 'Content-type: application/x-www-form-urlencoded',
                                //                 'content' => http_build_query(
                                //                     [
                                //                         'secret' => Config::get('services.recaptcha.secret'),
                                //                         'response' => $request->get('g-recaptcha-response'),
                                //                         'remoteip' => $request->ip(),
                                //                     ]
                                //                 )
                                //             ]
                                //         ]
                                //     )
                                // );
                                // $input = $request->all();
                                // $input['reCAPTCHA'] = json_decode($reCAPTCHA)->success;
                                // $validator = Validator::make($input, [
                                //     'domain' => 'required|min:4|domain|extension',
                                //     'reCAPTCHA' => 'required|accepted',
                                // ]);
                                // if ($validator->fails()) {
                                //     if($request->ajax())
                                //     {
                                //         return Response::json($validator->messages(), 400);
                                //     }else{
                                //         return redirect('whois-lookup')
                                //                 ->withErrors($validator)
                                //                 ->withInput();
                                //     }
                                // }
                                //$domain = $request->get('domain');
                                $pathinfo = pathinfo($domain);
                                $extension = $pathinfo['extension'];
                                $fp = fsockopen($whois[$extension], 43);
                                
                                $out = $domain."\r\n";
                                
                                fwrite($fp, $out);
                                
                                $response = '';
                                while (!feof($fp)) {
                                    $response .= fgets($fp, 4096);
                                }
                                
                                fclose($fp);
                                if ($request->ajax()) {
                                    return ['response' => $response];
                                }else{
                                    return $response;
                                }		
                      }
                    }
                } catch (\Exception $e) {
                        $dBmessage = $e->getMessage();
                        $message = "Something went wrong please try again!";
                        $log_type = "error_log";
                        $activityInterFace->dataSave($id = "", $dBmessage, $ArrayByID = "", $log_title, $log_type);
                
                        $error = \Illuminate\Validation\ValidationException::withMessages([
                                    'exception' => [$message]
                        ]);
                        throw $error;
                    } 
           }
   }
}
