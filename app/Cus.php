<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cus extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cus_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // https://www.youtube.com/watch?v=Aso3e_lQju4
    // https://stackoverflow.com/questions/44449076/laravel-5-4-change-authentication-users-table-name
    protected $table = 'customer';
    protected $guard = 'cus';
    protected $primaryKey = 'cus_id';
    // auth::check là gì
    // https://stackoverflow.com/questions/43642816/auth-guard-admin-is-not-defined
    // https://viblo.asia/p/tao-authentication-rieng-de-check-dang-nhap-trong-laravel-63vKj0WVl2R
    // Auth::guard->user
    // https://stackoverflow.com/questions/42029011/laravel-5-4-multi-auth-authguard-user-empty

}
