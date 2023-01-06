<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InclusionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'default_value',
        'description',
        'icon_path'
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('name', 'ilike', '%' . $search . '%')
                        ->orWhere('default_value', 'ilike', '%' . $search . '%')
                        ->orWhere('description', 'ilike', '%' . $search . '%');
                });
            }
        );
        
    }
}
