<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBankModel extends Model
{
    use HasFactory;
    protected $table = 'bank_details';
    protected $fillable = [
        'student_id',
        'bank_name',
        'account_number'
    ];
}
