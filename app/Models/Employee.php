<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'Employee'; // Tên bảng trong CSDL

    protected $fillable = [
        'user_name',
        'email',
        'password',
        'role_id',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'status'
    ];
}
