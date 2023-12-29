<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StduentEducationModel extends Model
{
    use HasFactory;
    protected $table = 'student_education';
    protected $fillable = [
        'student_id',
        'board_name'
    ];
}
