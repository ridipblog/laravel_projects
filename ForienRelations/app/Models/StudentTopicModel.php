<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTopicModel extends Model
{
    use HasFactory;
    protected $table = 'student_topic';
    protected $fillable = [
        'student_id',
        'topic'
    ];
}
