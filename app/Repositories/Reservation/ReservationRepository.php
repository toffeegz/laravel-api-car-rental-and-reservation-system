<?php

namespace App\Repositories\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class ReservationRepository extends BaseRepository implements ReservationRepositoryInterface
{

    /**
     * ReservationRepository constructor.
     *
     * @param Reservation $model
     */

    public function __construct(Reservation $model)
    {
        parent::__construct($model);
    }
}
