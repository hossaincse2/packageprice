<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
       //use SoftDeletes;
   protected $table = "activity_logs";
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'title', 'log_type', 'long_text', 'request_uri', 'client_ip', 'user_id'
   ];

       protected $with = ['user'];
   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       ''
   ];

   public function user() {
       return $this->belongsTo(\App\User::class);
   }
}
