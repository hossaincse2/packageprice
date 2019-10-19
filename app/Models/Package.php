<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $table = "packages";

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'package_name', 'type', 'query_limit','price','api_key'
    ];
}
