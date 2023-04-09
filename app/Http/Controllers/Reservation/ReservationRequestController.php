<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Reservation\ReservationServiceInterface;

class ReservationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelService;
    private $responseService;
    private $name = 'Reservation Request';
    
    public function __construct(
        ReservationServiceInterface $modelService, 
        ResponseServiceInterface $responseService
    ) {
        $this->modelService = $modelService;
        $this->responseService = $responseService;
    }

    public function unitDetails(string $unit_id)
    {
        $result = $this->modelService->unitCalendar($unit_id);
        return $this->responseService->successResponse($this->name, $result);
    }
}
