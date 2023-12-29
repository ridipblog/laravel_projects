<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class TeacherModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'teacher';


    protected $table = 'teachers';


    protected $fillable = [
        'email',
        'password'
    ];
}
