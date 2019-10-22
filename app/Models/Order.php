<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number', 'payment_method', 'user_id','package_id','query_count','status'
    ];

    public function package() {
        return $this->belongsTo(\App\Models\Package::class);
    }

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public function userPackageQuery() {
        return $this->hasOne(\App\Models\UserPackageQuery::class);
    }
}
