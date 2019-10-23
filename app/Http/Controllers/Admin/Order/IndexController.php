<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Contracts\OrderInterface;
use App\Contracts\PackageQueryInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(OrderInterface $order)
     {
         return view('admin.order.index',['data' => $order->findAll()]);
     }
     public function order_reports(OrderInterface $order, PackageQueryInterface $package_query)
     {
        // $countQuery = $package_query->countBy('user_id');
          $countQuery = $package_query->findAll();


         return view('admin.reports.user-package',['data' => $order->findAll(), 'countQuery' => $countQuery]);
     }

     public function packageQueries(){
        $url = "admin/queries/package-queries-print";
        return view('admin.order.reports', ['data' => [], 'url' => $url]);
    }

    public function packageQueriesAjax(Request $request, PackageQueryInterface $packageQueryInterface){
        try {
            $filters = $request->all();
           $data = $packageQueryInterface->allPackageQuery($filters);
           // echo "<pre>";
            //print_r($data);

//            print_r($data);die;
            return view('admin.order.order-grid', ["data" => $data]);
        } catch (\Exception $e) {
            throw $e;
        }
    } 

    public function _print(Request $request, PackageQueryInterface $packageQueryInterface) {

        try {
            $filters = $request->all();
            $data = $packageQueryInterface->allPackageQuery($filters);

//            print_r($data);die;
            return view('admin.order.order-print', ["data" => $data, "request" => $filters]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
