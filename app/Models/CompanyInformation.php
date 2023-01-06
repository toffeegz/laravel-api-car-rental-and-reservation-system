<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyInformation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'company_information';

    const DEFAULT = 1;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'profile_photo_path',
    ];

}
