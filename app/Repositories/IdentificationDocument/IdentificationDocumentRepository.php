<?php

namespace App\Repositories\IdentificationDocument;

use App\Models\IdentificationDocument;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class IdentificationDocumentRepository extends BaseRepository implements IdentificationDocumentRepositoryInterface
{

    /**
     * IdentificationDocumentRepository constructor.
     *
     * @param IdentificationDocument $model
     */

    public function __construct(IdentificationDocument $model)
    {
        parent::__construct($model);
    }
}
