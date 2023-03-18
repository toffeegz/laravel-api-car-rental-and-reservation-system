<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdentificationDocument extends Model
{
    use HasFactory, CreatedBy, SoftDeletes;

    protected $fillable = [
        'id_type',
        'front_image_path',
        'back_image_path',
        'verified_at',
        'verified_by',
        'created_by',
    ];
}
