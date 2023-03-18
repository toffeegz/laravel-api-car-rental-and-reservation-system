<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait CreatedBy {
    protected static function bootCreatedBy() {
        static::creating(function ($model) {
            if(is_null($model->created_by) && Auth::check()) {
                $model->created_by = Auth::user()->id;
            }
        });
    }
}