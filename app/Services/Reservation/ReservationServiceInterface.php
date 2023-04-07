<?php

namespace App\Services\Reservation;
use App\Repositories\Reservation\ReservationRepositoryInterface;

interface ReservationServiceInterface
{
    public function store(array $attributes, bool $created_by_admin);
}
