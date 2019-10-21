<?php
namespace App\Contracts;

use App\Models\Order;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyInterface
 *
 * @author pavel
 */
interface OrderInterface {
    //put your code here
    public function find($id);
    public function findBy($where);
    public function findAll();
    public function save(Order $order);
    public function delete($id);
}
