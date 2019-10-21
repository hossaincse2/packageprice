<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\Order;
use App\Contracts\OrderInterface;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;

/**
 * Description of orderRepo
 *
 * @author Pavel
 */
class OrderReop implements OrderInterface {

    private $Orderloquent;
    private $auth;

    /**
     * @param Order $order
     * @param Guard $auth
     */
    public function __construct(OrderInterface $order, Guard $auth) {
        $this->Orderloquent = $order;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return order;
     */
    public function find($id) {
        try {
            return $this->Orderloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
    }

    public function findAll() {
        return $this->Orderloquent->all();
    }

    /**
     * @param order $order
     * @return order|boolean
     */
    public function save(order $order) {
        //$order->user_id = $this->auth->user()->id;
        //$order->is_active = 1;
        if ($order->save())
            return $order;

        return false;
    }

    public function delete($id)
    {
        $entity = $this->find($id);
        if($entity)
            $entity->delete();
    }
}
