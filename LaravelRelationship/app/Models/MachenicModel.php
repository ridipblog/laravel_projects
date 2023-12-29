<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachenicModel extends Model
{
    use HasFactory;
    protected $table = 'machenic';
    protected $fillable = [
        'name'
    ];
    public function car()
    {
        return $this->hasOne(CarModel::class);
    }
    public function owner()
    {
        return $this->hasOneThrough(OwnerModel::class, CarModel::class);
    }
}
