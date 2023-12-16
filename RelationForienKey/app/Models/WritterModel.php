<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WritterModel extends Model
{
    use HasFactory;
    protected $table = 'writter';
    protected $fillable = [
        'name'
    ];
}
