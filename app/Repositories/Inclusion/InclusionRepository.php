<?php

namespace App\Repositories\Inclusion;

use App\Models\Inclusion;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class InclusionRepository extends BaseRepository implements InclusionRepositoryInterface
{

    /**
     * InclusionRepository constructor.
     *
     * @param Inclusion $model
     */

    public function __construct(Inclusion $model)
    {
        parent::__construct($model);
    }
}
