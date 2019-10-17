<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function package() {
        return $this->belongsTo(Models\Package::class);
    }

    public function factory() {
        return $this->belongsTo(Models\Factory::class, 'factory_id');
    }

    public function groups() {
        return $this->belongsToMany(UserGroup::class, "user_user_groups", "user_id", "group_id");
    }

    public function hasGroup($group) {
        $groups = $this->groups()->get(['group_code'])->toArray();


        //print_r($groups);exit;
        $grps = [];
        foreach ($groups as $g)
            $grps[] = $g['group_code'];

        return in_array($group, $grps);
    }
}
