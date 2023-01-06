<?php

namespace App\Repositories\InclusionType;

use App\Models\InclusionType;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class InclusionTypeRepository extends BaseRepository implements InclusionTypeRepositoryInterface
{

    /**
     * InclusionTypeRepository constructor.
     *
     * @param InclusionType $model
     */

    public function __construct(InclusionType $model)
    {
        parent::__construct($model);
    }
}
