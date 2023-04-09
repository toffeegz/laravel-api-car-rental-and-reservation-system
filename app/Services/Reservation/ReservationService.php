<?php

namespace App\Services\Reservation;

use Illuminate\Support\Facades\Log;
use App\Repositories\Reservation\ReservationRepositoryInterface;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Services\Reservation\ReservationServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class ReservationService implements ReservationServiceInterface
{
    private ReservationRepositoryInterface $modelRepository;
    private UnitRepositoryInterface $unitRepository;
    private $folderName;

    public function __construct(
        ReservationRepositoryInterface $modelRepository,
        UnitRepositoryInterface $unitRepository,
    ) {
        $this->modelRepository = $modelRepository;
        $this->unitRepository = $unitRepository;
        $this->folderName = 'Reservations';
    }

    public function unitCalendar(string $unit_id)
    {
        try {
            // Get unit details from unit repository
            $unit = $this->unitRepository->show($unit_id);

            // Get the start and end dates of the current month
            $now = Carbon::now();
            $startDate = $now->startOfMonth();
            $endDate = $now->endOfMonth();

            // Get list of reservations for the unit within the current month
            $reservations = $this->modelRepository->findByUnitAndDateRange($unit_id, $startDate, $endDate);

            // Initialize an empty array to hold the reservation status for each day of the month
            $reservationStatus = [];

            // Loop through each day of the month and check if the unit is reserved on that day
            for ($day = 1; $day <= $endDate->day; $day++) {
                $currentDate = Carbon::createFromDate($now->year, $now->month, $day);
                $isReserved = false;
                foreach ($reservations as $reservation) {
                    if ($currentDate->between($reservation->start_date, $reservation->end_date)) {
                        $isReserved = true;
                        break;
                    }
                }
                $reservationStatus[$day] = $isReserved ? "yes" : "no";
            }

            Log::info($reservationStatus);

            return $reservationStatus;
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }




}
