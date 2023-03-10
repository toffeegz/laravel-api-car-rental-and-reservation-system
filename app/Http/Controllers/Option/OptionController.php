<?php

namespace App\Http\Controllers\Option;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Utils\Response\ResponseServiceInterface;

class OptionController extends Controller
{
    private $responseService;
    private $name = 'Option';
    
    public function __construct(
        ResponseServiceInterface $responseService
    ) {
        $this->responseService = $responseService;
    }

    public function listValidIds()
    {
        $results = config('selfdriveph.list_valid_ids');
        return $this->responseService->successResponse($this->name, $results);
    }
}
