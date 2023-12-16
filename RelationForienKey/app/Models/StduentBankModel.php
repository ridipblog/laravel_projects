<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StduentBankModel extends Model
{
    use HasFactory;
    protected $table = 'student_bank';
    protected $fillable = [
        'student_id',
        'account_number'
    ];
}
