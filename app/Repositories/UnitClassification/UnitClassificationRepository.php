<?php

namespace App\Repositories\UnitClassification;

use App\Models\UnitClassification;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class UnitClassificationRepository extends BaseRepository implements UnitClassificationRepositoryInterface
{

    /**
     * UnitClassificationRepository constructor.
     *
     * @param UnitClassification $model
     */

    public function __construct(UnitClassification $model)
    {
        parent::__construct($model);
    }
}
