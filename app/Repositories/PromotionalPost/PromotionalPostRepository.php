<?php

namespace App\Repositories\PromotionalPost;

use App\Models\PromotionalPost;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class PromotionalPostRepository extends BaseRepository implements PromotionalPostRepositoryInterface
{

    /**
     * PromotionalPostRepository constructor.
     *
     * @param PromotionalPost $model
     */

    public function __construct(PromotionalPost $model)
    {
        parent::__construct($model);
    }
}
