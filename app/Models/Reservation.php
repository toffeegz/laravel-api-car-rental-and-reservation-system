<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unit_id',
        'user_id',
        'created_by',
        'status',
        'start_date',
        'end_date',
        'pickup_location',
        'destination',
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('pickup_location', 'ilike', '%' . $search . '%')
                        ->orWhere('destination', 'ilike', '%' . $search . '%');
                });
            }
        );
        
    }
}
