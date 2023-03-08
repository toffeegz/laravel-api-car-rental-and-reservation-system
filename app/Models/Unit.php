<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CreatedBy;

class Unit extends Model
{
    use HasFactory, SoftDeletes, CreatedBy;

    protected $fillable = [
        'model',
        'description',
        'brand_id',
        'unit_classification_id',
        'created_by',
        'photo_path',
        'range_from',
        'range_to',
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query->select('units.*', 'brands.name', 'unit_classifications.name', 'users.name as created_by')
            ->leftjoin('brands', 'units.brand_id','=', 'brands.id')
            ->leftjoin('unit_classifications', 'units.unit_classification_id','=', 'unit_classifications.id')
            ->leftjoin('users', 'units.created_by','=', 'users.id')
            ->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('model', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('brands.name', 'like', '%' . $search . '%')
                        ->orWhere('unit_classifications.name', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                });
            }
        );
        
    }
}
