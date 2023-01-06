<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    const PENDING = 0;
    const APPROVED = 1;
    
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'status',
        'branch_id',
    ];

    
}
