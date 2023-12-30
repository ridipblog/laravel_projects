<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserDetailsModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'employee';
    protected $table = 'user_details';
    protected $fillable = [
        'name',
        'password'
    ];
    protected $hidden = [
        'password'
    ];
}
