<?php

namespace App\Repositories\Reservation;

use App\Repositories\Base\BaseRepositoryInterface;

interface ReservationRepositoryInterface extends BaseRepositoryInterface
{
    public function findByUnitAndDateRange(string $unit_id, $startDate, $endDate);
}
