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
}
