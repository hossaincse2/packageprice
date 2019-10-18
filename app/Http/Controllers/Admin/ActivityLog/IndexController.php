<?php

namespace App\Http\Controllers\Admin\ActivityLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function auditLog()
     {
         return view('admin.activityLog.auditLog');
     }
     public function errorLog()
     {
         return view('admin.activityLog.errorLog');
     }
}
