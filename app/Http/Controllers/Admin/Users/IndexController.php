<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Contracts\UserInterface;
use App\Contracts\UserGroupInterface;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use Auth;
use DB;

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
    public function index(UserInterface $user)
    {
        if (Auth::User()->hasGroup('admin') || Auth::User()->hasGroup('customer')) {
            return view('admin.users.index', ['data' => $user->findAll()]);
        } else {
            return response('Unauthorized.', 401);
        }
        
    }

    public function changePassword() {
        return view('admin.users.changePassword');
    }




    public function store($id = null, UserRequest $request, ActivityLogInterface $activityInterFace) {


        //echo "1000"; exit;
        
                $groups = $request->get('group_id');
        
        
                $message = "";
                try {
                    if ($request->isMethod("POST")) {
        
        
                             $requestData['is_active'] = ($request['is_active']) ? $request['is_active'] : 0;
        
                        $requestExcept = $request->except(['save', '_token']);
                        $requestExcept = array_merge($requestExcept, $requestData);
                        unset($requestExcept['_token']);
                        unset($requestExcept['save']);
                            unset($requestExcept['group_id']);
        
                      // $requestExcept = $request->except(['save', '_token']);
                        //unset($requestExcept['group_id']);
        
                        //print_r($requestExcept);
        
        
                        if ($id) {
        
                            /*
                              // For User Group ID: 03-06-2019
                              if (is_array($requestExcept['group_id'])) {
                              //echo 'This is an array....';
                              $grouIDArray = "group_id:";
                              foreach ($requestExcept['group_id'] as $key => $value) {
                              $grouIDArray.=$key . "=" . $value . ", ";
                              }
                              echo $grouIDArray;
                              }
                              /*
        
        
        
                              /** @var User $userEloquent */
                            $log_title = "Edit User";
        
                            $userEloquent = User::findOrFail($id);
                            $ArrayByID = $userEloquent->toArray();
        
        
                            if ($userEloquent)
                                $data = $userEloquent->update($requestExcept);
        
                            if ($groups = $request->get('group_id')) {
                                $userEloquent->groups()->sync($groups);
                            }
        
                            $message = "User Updated Successfully!";
                        } else {
        
                            $ArrayByID = "";
                            $log_title = "Add User";
        
                            $user = new \App\User($request->all());
                            if (Auth::User()->hasGroup('store-admin')) {
                                $user->store_id = Auth::user()->store_id;
                            }
        
                            if (Auth::User()->hasGroup('factory-admin')) {
                                $user->factory_id = Auth::user()->factory_id;
                            }
        
                            $user->password = \Hash::make("123456");
        
                            $data = $user->save();
        
                            if ($groups = $request->get('group_id')) {
                                $user->groups()->sync($groups);
                            }
        
                            $message = "User Added Successfully!";
                        }
        
        
        
        
                        if ($data) {
        
                            $log_type = "audit_log";
                            $activityInterFace->dataSave($id, $requestExcept, $ArrayByID, $log_title, $log_type);
        
                            Session::flash('m-class', 'alert-success');
                            Session::flash('message', $message);
        
                            return redirect()->route('user-list');
                        }
                    }
                } catch (\Exception $e) {
                    $dBmessage = $e->getMessage();
                    $message = "Something went wrong please try again!";
                    $log_type = "error_log";
                    $activityInterFace->dataSave($id = "", $dBmessage, $ArrayByID = "", $log_title, $log_type);
        
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                                'exception' => [$dBmessage]
                    ]);
                    throw $error;
                }
            }


            public function destroy($id, ActivityLogInterface $activityInterFace) {
                //echo $id;exit;
                         $log_title = "Delete User";
                        try {
                            if ($id) {
                                /** @var User $vat */
                                $response = User::findOrFail($id);
                                $response->delete($id);
                
                                $requestExcept = $response->toArray();
                
                                  unset($requestExcept['groups']);
                                  unset($requestExcept['store']);
                                   unset($requestExcept['factory']);
                
                               // print_r($requestExcept);
                                //exit;
                
                
                                $log_type = "audit_log";
                                $activityInterFace->dataSave($id = "", $requestExcept, $ArrayByID = "", $log_title, $log_type);
                
                                $message = "User Deleted Successfully!";
                                Session::flash('m-class', 'alert-success');
                                Session::flash('message', $message);
                
                                return redirect()->route('user-list');
                            } else {
                                $message = "User does not deleted Successfully!";
                                Session::flash('m-class', 'alert-danger');
                                Session::flash('message', $message);
                
                                return redirect()->route('user-list');
                            }
                        } catch (\Exception $e) {
                            $dBmessage = $e->getMessage();
                            $message = "Something went wrong please try again!";
                            Session::flash('m-class', 'alert-danger');
                            Session::flash('message', $message);
                            $log_type = "error_log";
                
                            $activityInterFace->dataSave($id = "", $dBmessage, $ArrayByID = "", $log_title, $log_type);
                
                            return redirect()->route('user-list');
                        }
                    }

                    public function changepasswordProccess() {


                        if (Auth::User()->hasGroup('operator') && Auth::User()->groups->count() == 1) {
                            return response('Unauthorized.', 401);
                        }
                
                        if (Auth::User()->hasGroup('admin')) {
                            $users = User::all();
                        } else if (Auth::User()->hasGroup('super-admin')) {
                            $users = User::all();
                        } else if (Auth::User()->hasGroup('store-admin')) {
                
                //           $store_id = Auth::user()->store_id;
                //             $users = DB::table('users')
                //                            ->join('user_user_groups', 'users.id', '=', 'user_user_groups.user_id')
                //                           ->join('user_groups', 'user_user_groups.group_id', '=', 'user_groups.id')
                //                      ->join('stores', 'users.store_id', '=', 'stores.id')
                //                           ->where('users.store_id', $store_id)
                //                            ->whereNotIn('user_groups.group_code', 'admin')
                //                            ->select('users.*')
                //                            ->get();
                
                            $store_id = Auth::user()->store_id;
                            $users = User::all()->where('store_id', $store_id);
                        } else if (Auth::User()->hasGroup('factory-admin')) {
                            $factory_id = Auth::user()->factory_id;
                            $users = User::all()->where('factory_id', $factory_id);
                        } else {
                            $id = Auth::user()->id;
                            $users = User::all()->where('id', $id);
                        }
                
                        $message = "";
                        return view('adminlte::users.changepassword', ['message' => $message, 'userlist' => $users, 'title' => 'Change Password']);
                    }
                
                    public function updatepassord(UserPasswordUpdateRequest $request) {
                
                        if (Auth::User()->hasGroup('operator') && Auth::User()->groups->count() == 1) {
                            return response('Unauthorized.', 401);
                        }
                
                        $message = "";
                        try {
                            if ($request->isMethod("POST")) {
                                $password = $request['password'];
                                $conpassword = $request['conpassword'];
                
                                if ($request['id']) {
                
                                    /** @var User $userEloquent */
                                    $userEloquent = User::findOrFail($request['id']);
                
                
                                    $request['password'] = \Hash::make($request->get('password'));
                                    if ($userEloquent)
                                        $data = $userEloquent->update($request->all());
                                    $message = "Password has been changed successfully for Email :" . $userEloquent->email . ", Name :" . $userEloquent->name . "  !";
                                }
                
                
                                if ($data) {
                                    Session::flash('m-class', 'alert-success');
                                    Session::flash('message', $message);
                                    return redirect()->route('change-user-password');
                                }
                            }
                        } catch (\Exception $e) {
                            $dBmessage = $e->getMessage();
                            $message = "Something went wrong please try again!";
                            $error = \Illuminate\Validation\ValidationException::withMessages([
                                        'exception' => [$message]
                            ]);
                            throw $error;
                        }
                    }
                
                    public function search(Request $request) {
                
                
                
                        $requestData = $request->all();
                
                
                        if (isset($requestData['user_type']) && $requestData['user_type'] != "") {
                            if ($requestData['user_type'] == 0) {
                                $users = User::where('factory_id',Auth::user()->factory_id)->orWhere('store_id',$store_id = Auth::user()->store_id)->get();
                                $status = "All";
                            }
                
                            if ($requestData['user_type'] == 'factory') {
                                $factory_id = Auth::user()->factory_id;
                                $users = User::all()->where('factory_id', $factory_id);
                            }
                
                            if ($requestData['user_type'] == 'store') {
                                $store_id = Auth::user()->store_id;
                                $users = User::all()->where('store_id', $store_id);
                            }
                        } else {
                            if (Auth::User()->hasGroup('store-admin')) {
                                $store_id = Auth::user()->store_id;
                                $users = User::all()->where('store_id', $store_id);
                            }
                            if (Auth::User()->hasGroup('factory-admin')) {
                                $factory_id = Auth::user()->factory_id;
                                $users = User::all()->where('factory_id', $factory_id);
                                $status = "Factory  1";
                            }
                        }
                
                
                
                //echo $status; exit;
                
                
                        return view('adminlte::users.grid', ["data" => $users]);
                    }


}
