<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    // protected $guard = 'admin';
    protected $table = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
