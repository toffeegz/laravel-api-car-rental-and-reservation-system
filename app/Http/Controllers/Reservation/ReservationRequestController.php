<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $reservationRepository;
    private $unitRepository;
    private $responseService;
    private $name = 'Reservation Request';
    
    public function __construct(
        ReservationRepositoryInterface $reservationRepository, 
        UnitRepositoryInterface $unitRepository, 
        ResponseServiceInterface $responseService
    ) {
        $this->reservationRepository = $reservationRepository;
        $this->unitRepository = $unitRepository;
        $this->responseService = $responseService;
    }

    public function unitDetails(string $unit_id)
    {
        // reservation service tawagin mo dito
        // get current month and year
        // create specific function to get arrays of days of reservation list
        // $result = $this->unitRepository->details($unit_id);
        // return $this->responseService->successResponse($this->name, $result);
    }
}
