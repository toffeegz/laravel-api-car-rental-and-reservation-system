<?php

namespace App\Http\Controllers\UnitClassification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UnitClassification\UnitClassificationRepositoryInterface;
use App\Services\Utils\Response\ResponseServiceInterface;
use App\Http\Requests\UnitClassification\UnitClassificationRequest as ModelRequest;

class UnitClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelRepository;
    private $responseService;
    private $name = 'UnitClassification';
    
    public function __construct(
        UnitClassificationRepositoryInterface $modelRepository, 
        ResponseServiceInterface $responseService
    ) {
        $this->modelRepository = $modelRepository;
        $this->responseService = $responseService;
    }

    public function index()
    {
        $results = $this->modelRepository->lists(request(['search']));
        return $this->responseService->successResponse($this->name, $results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelRequest $request)
    {
        $result = $this->modelRepository->create($request->all());
        return $this->responseService->storeResponse($this->name, $result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->modelRepository->show($id);
        return $this->responseService->successResponse($this->name, $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModelRequest $request, $id)
    {
        $result = $this->modelRepository->update($request->all(), $id);
        return $this->responseService->updateResponse($this->name, $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archive(string $id)
    {
        $result = $this->modelRepository->delete($id);
        return $this->responseService->successResponse($this->name, $result);
    }

    public function restore(string $id)
    {
        $result = $this->modelRepository->restore($id);
        return $this->responseService->successResponse($this->name, $result);
    }
}
