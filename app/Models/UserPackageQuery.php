<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPackageQuery extends Model
{
    protected $table = "user_package_queries";

    protected $fillable = [
        'user_id', 'order_id', 'package_id','query_count','domain_name', 'ip_address', 'request_url', 'api_key'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public function package() {
        return $this->belongsTo(\App\Models\Package::class);
    }

    public function order() {
        return $this->belongsTo(\App\Models\Order::class);
    }
}
