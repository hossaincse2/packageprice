<?php

namespace App\Http\Controllers\Admin\ActivityLog;

use App\Http\Controllers\Controller;
use App\Contracts\ActivityLogInterface;
use Illuminate\Http\Request;

class ErrorLogsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, ActivityLogInterface $activityLogs)
     {
        $requestData = $request->all();
        $data = $activityLogs->allErrorLogs($requestData);
        $url = "admin/report/error-log-print";
         return view('admin.activityLog.errorLog', ['data' => $data, 'url' => $url]);
     }
      
     public function ajax(Request $request, ActivityLogInterface $activityLogs) {

   

        try {
            $filters = $request->all();
           $data = $activityLogs->allErrorLogs($filters);
           // echo "<pre>";
            //print_r($data);

//            print_r($data);die;
            return view('admin.activityLog.error-log-grid', ["data" => $data]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function _print(Request $request, ActivityLogInterface $activityLogs) {

        try {
            $filters = $request->all();
            $data = $activityLogs->allErrorLogs($filters);

//            print_r($data);die;
            return view('admin.activityLog.error-log-print', ["data" => $data, "request" => $filters]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
