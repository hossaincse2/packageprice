<?php
namespace App\Contracts;

use App\Models\UserGroup;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserGroupInterface
 *
 * @author Rajan Bhatta
 */
interface UserGroupInterface {
    //put your code here
    public function find($id);
    public function findBy($where);
    public function findAll();
    public function save(UserGroup $userGroup);
    public function delete($id);
}