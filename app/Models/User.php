<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'google_id',
        'role_id',
        'branch_id',
        'validid_verified_at',
        'validid_verified_at',
        'verified_by',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'email_verified_at',
        'remember_token'
    ];

    public function scopeFilter($query, array $filters)
    {
        $search = $filters['search'] ?? false;
        $query
            ->when($filters['search'] ?? false, 
            function($query) use($search) {
                $query->where(function($query) use($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            }
        );
        
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
