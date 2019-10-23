<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Auth;
// use ConsoleTVs\Charts\Facades\Charts;
// use Charts;
use App\Charts\ChartJs;
use App\Charts\Echarts;
use App\Charts\Frappe;
use App\Charts\Fusioncharts;
use App\Charts\Highcharts;
use App\Charts\C3;

class IndexController extends Controller
{

     /** @var Guard $auth */
     private $auth;

     /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct(Guard $auth) {
         $this->middleware('auth');
         $this->auth = $auth;
        
     }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $chart = new ChartJs;
        //   $chart->title("First Response Time");  
          $chart->labels(['January', 'February', 'March', 'April', 'May','June','July','August','September','Octobor','November','December']);
          $chart->dataset('My dataset', 'pie', [5, 25, 3, 10,25,5, 25, 3, 10,25,10,20]);
          //Color For ChartJs
         // $chart->dataset('My dataset', 'bar', [5, 25, 3, 10,25,5, 25, 3, 10,25,10,20])->backgroundcolor('green')->color(collect(['#7d5fff','#32ff7e', '#ff4d4d']));
   	
         return view('admin.dashboard.index', ['chart' => $chart]);
    }

    public function profile() {
        return view('admin.dashboard.user_profile');
    }

}
