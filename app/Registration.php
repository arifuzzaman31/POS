<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Registration extends Authenticatable
{
    protected $table = 'registrations';
    protected $fillable = [ 'name', 'email', 'address', 'phone', 'password', 'confirm_password'
    ];
}
