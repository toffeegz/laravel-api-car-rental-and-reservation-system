<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionalPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'photo_path',
        'start_date',
        'end_date',
        'visible',
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('name', 'ilike', '%' . $search . '%')
                        ->orWhere('description', 'ilike', '%' . $search . '%')
                        ->orWhere('photo_path', 'ilike', '%' . $search . '%')
                        ->orWhere('start_date', 'ilike', '%' . $search . '%')
                        ->orWhere('end_date', 'ilike', '%' . $search . '%')
                        ->orWhere('visible', 'ilike', '%' . $search . '%');
                });
            }
        );
        
    }
}
