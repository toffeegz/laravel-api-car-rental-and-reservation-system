<?php

namespace App\Services\Unit;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Repositories\Inclusion\InclusionRepositoryInterface;

interface UnitServiceInterface
{
    public function store(array $attributes);
}
