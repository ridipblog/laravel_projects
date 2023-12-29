<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table = 'car';
    protected $fillable = [
        'machenic_model_id',
        'car'
    ];
    public function owner()
    {
        return $this->hasOne(OwnerModel::class);
    }
    public function machenic()
    {
        return $this->belongsTo(MachenicModel::class, 'machenic_model_id');
    }
}
