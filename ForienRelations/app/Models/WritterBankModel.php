<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WritterBankModel extends Model
{
    use HasFactory;
    protected $table = 'writter_bank';
    protected $fillable = [
        'account_number',
        'writter_id'
    ];
}
