<?php

namespace App\Contracts;

/**
 * Description of UserInterface
 *
 * @author Rajan Bhatta
 */
interface UserInterface {

    public function searchAll($search = array());
    public function findAll();
}