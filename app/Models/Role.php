<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('name', 'ilike', '%' . $search . '%')
                        ->orWhere('slug', 'ilike', '%' . $search . '%')
                        ->orWhere('description', 'ilike', '%' . $search . '%');
                });
            }
        );
        
    }
}
