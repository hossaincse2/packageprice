<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\Package;
use App\Contracts\PackageInterface;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;

/**
 * Description of PackageRepo
 *
 * @author Pavel
 */
class PackageRepo implements PackageInterface {

    private $packageEloquent;
    private $auth;

    /**
     * @param Package $package
     * @param Guard $auth
     */
    public function __construct(Package $package, Guard $auth) {
        $this->packageEloquent = $package;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return Package;
     */
    public function find($id) {
        try {
            return $this->packageEloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
    }

    public function findAll() {
        return $this->packageEloquent->all();
    }

    /**
     * @param Package $company
     * @return Package|boolean
     */
    public function save(Package $package) {
        //$company->user_id = $this->auth->user()->id;
        //$company->is_active = 1;
        if ($package->save())
            return $package;

        return false;
    }

    public function delete($id)
    {
        $entity = $this->find($id);
        if($entity)
            $entity->delete();
    }
}
