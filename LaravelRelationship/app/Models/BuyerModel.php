<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerModel extends Model
{
    use HasFactory;
    protected $table = "buyer";
    protected $fillable = [
        'buyer_name'
    ];
    public function mobile()
    {
        return $this->hasOne(MobileModel::class);
    }
}
