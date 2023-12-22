<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDeveloperSalaryModel extends Model
{
    use HasFactory;
    protected $table = 'web_developer_salary';
    protected $fillable = [
        'employee_id',
        'salary'
    ];
}
