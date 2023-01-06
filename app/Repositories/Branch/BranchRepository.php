<?php

namespace App\Repositories\Branch;

use App\Models\Branch;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class BranchRepository extends BaseRepository implements BranchRepositoryInterface
{

    /**
     * BranchRepository constructor.
     *
     * @param Branch $model
     */

    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
}
