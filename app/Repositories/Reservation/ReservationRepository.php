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

    public function findByUnitAndDateRange(string $unit_id, $startDate, $endDate)
    {
        return $this->model->where('unit_id', $unit_id)
            ->where('status', 2)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<', $startDate)
                            ->where('end_date', '>', $endDate);
                    });
            })
            ->get();
    }

}
