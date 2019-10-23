<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\UserPackageQuery;
use App\Contracts\OrderInterface;
use App\Contracts\PackageQueryInterface;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;

/**
 * Description of orderRepo
 *
 * @author Pavel
 */
class PackageQueryReop implements PackageQueryInterface {

    private $PackageQueryEloquent;
    private $auth;

    /**
     * @param package_query $order
     * @param Guard $auth
     */
    public function __construct(UserPackageQuery $package_query, Guard $auth) {
        $this->PackageQueryEloquent = $package_query;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return package_query;
     */
    public function find($id) {
        try {
            return $this->PackageQueryEloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
        return $this->PackageQueryEloquent->where($where)->all();
    }

    public function countBy($where) {
        return $this->PackageQueryEloquent->groupBy($where)->count();
    }

    public function findAll() {
        return $this->PackageQueryEloquent->all();
    }

    /**
     * @param package_query $order
     * @return package_query|boolean
     */
    public function save(UserPackageQuery $package_query) {
        //$order->user_id = $this->auth->user()->id;
        //$order->is_active = 1;
        if ($package_query->save())
            return $package_query;

        return false;
    }

    public function delete($id)
    {
        $entity = $this->find($id);
        if($entity)
            $entity->delete();
    }

    public function allPackageQuery($search = array()) { 

        $packageQuery = $this->PackageQueryEloquent;
  
        // $packageQuery = $packageQuery->where("log_type", "=", "audit_log");

        if ((isset($search['start_at']) && isset($search['end_at'])) && ($start_at = $search['start_at'] && $end_at = $search['end_at'])) {
            $search['end_at'] = $search['end_at'] . " 23:59:59";
            $search['start_at'] = $search['start_at'] . " 00:00:00";
            $packageQuery = $packageQuery->where("created_at", ">=", $search['start_at'])->where("created_at", "<=", $search['end_at']);
        } else if (isset($search['start_at']) && $start_at = $search['start_at']) {
            $search['start_at'] = $search['start_at'] . " 00:00:00";
            $packageQuery = $packageQuery->where("created_at", ">=", $start_at);
        } else if (isset($search['end_at']) && $end_at = $search['end_at']) {
            $search['end_at'] = $search['end_at'] . " 23:59:59";
            $search['start_at'] = $search['start_at'] . " 00:00:00";
            $packageQuery = $packageQuery->where("created_at", "<=", $end_at);
        }

        return $packageQuery->orderBy('id', 'desc')->get();
        //echo $auditLogs->toSql();exit;
        //dd(DB::getQueryLog());
    }
}
