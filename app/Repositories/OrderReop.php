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

    private $OrderEloquent;
    private $auth;

    /**
     * @param Order $order
     * @param Guard $auth
     */
    public function __construct(Order $order, Guard $auth) {
        $this->OrderEloquent = $order;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return order;
     */
    public function find($id) {
        try {
            return $this->OrderEloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
        return $this->OrderEloquent->where($where)->get();
    } 

    public function findAll() {
        return $this->OrderEloquent->all();
    }

    /**
     * @param order $order
     * @return order|boolean
     */
    public function save(Order $order) {
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
