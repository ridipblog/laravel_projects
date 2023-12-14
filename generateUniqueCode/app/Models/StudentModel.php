<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'student_code',
        'student_name',
        'email',
        'file_1',
        'file_2',
        'file_3'
    ];
}
