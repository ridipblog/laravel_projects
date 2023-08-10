<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'student_name',
        'student_email'
    ];
}
