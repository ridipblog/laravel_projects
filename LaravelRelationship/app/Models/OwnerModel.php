<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerModel extends Model
{
    use HasFactory;
    protected $table = 'owner';
    protected $fillable = [
        'owner',
        'car_model_id'
    ];
    public function car()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
}
