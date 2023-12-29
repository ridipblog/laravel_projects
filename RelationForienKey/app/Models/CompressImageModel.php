<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompressImageModel extends Model
{
    use HasFactory;
    protected $table = 'compress_image';
    protected $fillable = [
        'image_path'
    ];
}
