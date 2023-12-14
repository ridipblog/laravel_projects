<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducationModel extends Model
{
    use HasFactory;
    protected $table = 'education_details';
    protected $fillable = [
        'student_id',
        'board_name',
        'pass_year'
    ];
}
