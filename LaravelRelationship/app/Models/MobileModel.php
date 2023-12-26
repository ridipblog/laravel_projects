<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileModel extends Model
{
    use HasFactory;
    protected $table = "mobile";
    protected $fillable = [
        'buyer_model_id',
        'phone_name'
    ];
    public function buyer()
    {
        return $this->belongsTo(BuyerModel::class, 'buyer_model_id');
    }
}
