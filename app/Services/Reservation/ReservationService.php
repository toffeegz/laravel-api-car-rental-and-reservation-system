<?php

namespace App\Services\Reservation;

use Illuminate\Support\Facades\Log;
use App\Repositories\Reservation\ReservationRepositoryInterface;
use App\Services\Reservation\ReservationServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class ReservationService implements ReservationServiceInterface
{
    private ReservationRepositoryInterface $modelRepository;
    private $folderName;

    public function __construct(
        ReservationRepositoryInterface $modelRepository,
    ) {
        $this->modelRepository = $modelRepository;
        $this->folderName = 'Reservations';
    }

    public function unitDetails(array $attributes, bool $created_by_admin)
    {
        try {
            
        } catch (\Exception $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }
    /// dito kana


}
