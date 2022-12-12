<?php

namespace App\Repositories\TransactionStatus;

use App\Models\TransactionStatus;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class TransactionStatusRepository extends BaseRepository implements TransactionStatusRepositoryInterface
{

    /**
     * TransactionStatusRepository constructor.
     *
     * @param TransactionStatus $model
     */

    public function __construct(TransactionStatus $model)
    {
        parent::__construct($model);
    }
}
