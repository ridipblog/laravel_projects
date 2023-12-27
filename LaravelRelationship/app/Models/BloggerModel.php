<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloggerModel extends Model
{
    use HasFactory;
    protected $table = "blogger";
    protected $fillable = [
        'bloger_name'
    ];
    public function posts()
    {
        return $this->hasMany(PostsModel::class);
    }
}
