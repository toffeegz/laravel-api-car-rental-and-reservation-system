<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CreatedBy {
    protected static function bootCreatedBy() {
        static::saving(function ($model) {
            if(isset($model['created_by']) && Auth::check()) {
                $model->created_by = Auth::user()->id;
            }
        });
    }
}