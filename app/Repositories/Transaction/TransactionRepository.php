<?php

namespace App\Repositories\Transaction;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{

    /**
     * TransactionRepository constructor.
     *
     * @param Transaction $model
     */

    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
}
