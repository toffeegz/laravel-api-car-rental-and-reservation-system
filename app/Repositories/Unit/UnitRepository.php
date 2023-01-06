<?php

namespace App\Repositories\Unit;

use App\Models\Unit;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class UnitRepository extends BaseRepository implements UnitRepositoryInterface
{

    /**
     * UnitRepository constructor.
     *
     * @param Unit $model
     */

    public function __construct(Unit $model)
    {
        parent::__construct($model);
    }
}
