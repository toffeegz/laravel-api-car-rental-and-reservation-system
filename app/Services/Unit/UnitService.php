<?php

namespace App\Services\Unit;

use Illuminate\Support\Facades\Log;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Repositories\Inclusion\InclusionRepositoryInterface;
use App\Services\Unit\UnitServiceInterface;

class UnitService implements UnitServiceInterface
{
    private UnitRepositoryInterface $modelRepository;
    private InclusionRepositoryInterface $inclusionRepository;
    
    public function __construct(
        UnitRepositoryInterface $modelRepository,
        InclusionRepositoryInterface $inclusionRepository,
    ) {
        $this->modelRepository = $modelRepository;
        $this->inclusionRepository = $inclusionRepository;
    }

    public function store(array $attributes)
    {
        $unit_result = $this->modelRepository->create($attributes);
        if($unit_result && isset($attributes['inclusions'])) {
            $inclusions_result = [];
            $inclusions = $attributes['inclusions'];
            foreach($inclusions as $inclusion) {
                $inclusions_result[] = $this->inclusionRepository->create($inclusion);
            }
            Log::info($inclusions);
        }
        return $unit_result;
    }
}
