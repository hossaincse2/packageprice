<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\UserGroup;
use App\Contracts\UserGroupInterface;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;
use Auth;

/**
 * Description of UserGroupRepo
 *
 * @author Rajan Bhatta
 */
class UserGroupRepo implements UserGroupInterface {

    private $userGroupEloquent;
    private $auth;

    /**
     * @param UserGroup $userGroup
     * @param Guard $auth
     */
    public function __construct(UserGroup $userGroup, Guard $auth) {
        $this->userGroupEloquent = $userGroup;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return UserGroup;
     */
    public function find($id) {
        try {
            return $this->userGroupEloquent->findOrFail($id);
        } catch (\Exception $e) {
            return "no result found";
        }
    }

    public function findBy($where) {
        
    }

    public function findAll() {
        return $this->userGroupEloquent->where('is_active', '=', "1")->get();
    }

    /**
     * @param UserGroup $userGroup
     * @return UserGroup|boolean
     */
    public function save(UserGroup $userGroup) {
        //$userGroup->user_id = $this->auth->user()->id;

        if ($userGroup->save())
            return $userGroup;

        return false;
    }

    public function delete($id) {
        $entity = $this->find($id);
        if ($entity)
            $entity->delete();
    }

}
