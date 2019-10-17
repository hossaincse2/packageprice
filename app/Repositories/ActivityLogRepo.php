<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\Package;
use App\Contracts\ActivityLogInterface;
use App\Models\ActivityLog;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;

/**
 * Description of PackageRepo
 *
 * @author Pavel
 */
class ActivityLogRepo implements ActivityLogInterface {

    private $activityLogEloquent;
    private $auth;

    /**
     * @param ActivityLog $package
     * @param Guard $auth
     */
    public function __construct(ActivityLog $activityLog, Guard $auth) {
        $this->activityLogEloquent = $activityLog;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return ActivityLog;
     */
    public function find($id) {
        try {
            return $this->activityLogEloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
    }

    public function findAll() {
        return $this->activityLogEloquent->all();
    }

    /**
     * @param ActivityLog $activityLog
     * @return ActivityLog|boolean
     */
    public function save(ActivityLog $activityLog) {
        //$company->user_id = $this->auth->user()->id;
        //$company->is_active = 1;
        if ($activityLog->save())
            return $activityLog;

        return false;
    }

    public function delete($id)
    {
        $entity = $this->find($id);
        if($entity)
            $entity->delete();
    }
}
