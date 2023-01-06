<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Inclusion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unit_id',
        'inclusion_type_id',
        'value',
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query->select('inclusions.*', 'units.model', 'inclusion_types.name')
            ->leftjoin('units', 'inclusions.unit_id','=', 'units.id')
            ->leftjoin('inclusion_types', 'inclusions.inclusion_type_id','=', 'inclusion_types.id')
            ->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('value', 'like', '%' . $search . '%')
                        ->orWhere('units.model', 'like', '%' . $search . '%')
                        ->orWhere('inclusion_types.name', 'like', '%' . $search . '%');
                });
            }
        );
        
    }
}
