<?php

namespace App\Services\Reservation;
use App\Repositories\Reservation\ReservationRepositoryInterface;

interface ReservationServiceInterface
{
    public function unitCalendar(string $unit_id);
}
