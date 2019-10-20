<?php

namespace App\Http\Controllers\Admin\ActivityLog;

use App\Http\Controllers\Controller;
use App\Contracts\ActivityLogInterface;
use Illuminate\Http\Request;

class AuditLogsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, ActivityLogInterface $activityLogs)
     {
        $requestData = $request->all();
        $data = $activityLogs->allAuditLogs($requestData);
        $url = "admin/report/audit-log-print";
         return view('admin.activityLog.auditLog', ['data' => $data, 'url' => $url]);
     }
     public function errorLog()
     {
         return view('admin.activityLog.errorLog');
     }

     public function ajax(Request $request, ActivityLogInterface $activityLogs) {

   

        try {
            $filters = $request->all();
           $data = $activityLogs->allAuditLogs($filters);
           // echo "<pre>";
            //print_r($data);

//            print_r($data);die;
            return view('admin.activityLog.audit-log-grid', ["data" => $data]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function _print(Request $request, ActivityLogInterface $activityLogs) {

        try {
            $filters = $request->all();
            $data = $activityLogs->allAuditLogs($filters);

//            print_r($data);die;
            return view('admin.activityLog.audit-log-print', ["data" => $data, "request" => $filters]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
