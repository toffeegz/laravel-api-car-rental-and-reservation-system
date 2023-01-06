<?php

namespace App\Repositories\CompanyInformation;

use App\Models\CompanyInformation;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class CompanyInformationRepository extends BaseRepository implements CompanyInformationRepositoryInterface
{

    /**
     * CompanyInformationRepository constructor.
     *
     * @param CompanyInformation $model
     */

    public function __construct(CompanyInformation $model)
    {
        parent::__construct($model);
    }
}
