<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDeveloperModel extends Model
{
    use HasFactory;
    protected $table = 'web_developer';
    protected $fillable = [
        'name',
        'email'
    ];
}
