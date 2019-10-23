<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Contracts\UserInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;
use App\User;
use Auth;

/**
 * Description of UserRepo
 *
 */
class UserRepo implements UserInterface {

    private $userEloquent;

    /**
     * @param User $user
     * @param Guard $auth
     */
    public function __construct(User $user, Guard $auth) {
        $this->userEloquent = $user;
    }

    /**
     * @param integer $id
     * @return User;
     * @throws
     */

   public function findAll() {
        return $this->userEloquent->all();
    }
    public function searchAll($search = array()) {

        $user = $this->userEloquent
                ->join('user_user_groups', "users.id", "=", "user_user_groups.user_id")
                ->join('user_groups', "user_user_groups.group_id", "=", "user_groups.id");

        if (isset($search['user_type']) && $search['user_type'] == "store") {
            $store_id = Auth::user()->store_id;
            $user = $user->where("users.store_id", "=", $store_id);
        }

        if (isset($search['user_type']) && $search['user_type'] == "factory") {
            $factory_id = Auth::user()->factory_id;
            $user = $user->where("users.factory_id", "=", $factory_id);
        }


        if (Auth::User()->hasGroup('admin')) {
            $user = $user->where("user_groups.group_code", "=", 'admin');
             
        }

        // echo  $sql = $user->toSql();exit;
        // return $user->get();
        //$user= $user->groupBy('users.id');
        return $user->orderBy("users.id", 'ASC')->get(['users.*']);
    }

}

