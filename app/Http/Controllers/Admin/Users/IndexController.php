<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Auth;

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
        return view('admin.users.index');
    }

    public function changePassword() {
        return view('admin.users.changePassword');
    }

}
