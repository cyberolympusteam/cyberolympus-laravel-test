<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Notifiable;
    protected $guard = 'Admin';
    protected $fillable = [
        'name', 'email', 'password'
    ];
    protected $hidden = [
        'password', 'rememeber_token '
    ];
}