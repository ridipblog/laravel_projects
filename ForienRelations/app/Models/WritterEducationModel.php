<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WritterEducationModel extends Model
{
    use HasFactory;
    protected $table = 'writter_education';
    protected $fillable = [
        'board_name',
        'writter_id'
    ];
}
