<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{

    /**
     * BrandRepository constructor.
     *
     * @param Brand $model
     */

    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
}
