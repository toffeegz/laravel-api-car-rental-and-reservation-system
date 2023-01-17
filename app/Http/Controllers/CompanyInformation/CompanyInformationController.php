<?php

namespace App\Http\Controllers\CompanyInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CompanyInformation\CompanyInformationRepositoryInterface;
use App\Services\Utils\ResponseServiceInterface;
use App\Http\Requests\CompanyInformation\CompanyInformationRequest as ModelRequest;
use App\Models\CompanyInformation;

class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelRepository;
    private $responseService;
    private $name = 'CompanyInformation';
    
    public function __construct(
        CompanyInformationRepositoryInterface $modelRepository, 
        ResponseServiceInterface $responseService
    ) {
        $this->modelRepository = $modelRepository;
        $this->responseService = $responseService;
    }

    public function index()
    {
        $result = $this->modelRepository->show(CompanyInformation::DEFAULT);
        return $this->responseService->successResponse($this->name, $result);
    }

    public function update(ModelRequest $request)
    {
        $result = $this->modelRepository->update($request->all(), CompanyInformation::DEFAULT);
        return $this->responseService->updateResponse($this->name, $result);
    }
}
