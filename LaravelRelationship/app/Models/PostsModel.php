<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'blogger_model_id',
        'post'
    ];
    public function blogger()
    {
        return $this->belongsTo(BloggerModel::class, 'blogger_model_id');
    }
}
