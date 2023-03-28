<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use App\Services\Utils\Response\ResponseServiceInterface;
use App\Http\Requests\User\CustomerRequest as ModelRequest;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelRepository;
    private $modelService;
    private $responseService;
    private $name = 'User';
    
    public function __construct(
        UserRepositoryInterface $modelRepository, 
        UserServiceInterface $modelService,
        ResponseServiceInterface $responseService
    ) {
        $this->modelRepository = $modelRepository;
        $this->modelService = $modelService;
        $this->responseService = $responseService;
    }

    public function index()
    {
        $results = $this->modelRepository->userLists($is_customer = true, request(['search']));
        return $this->responseService->successResponse($this->name, $results);
    }

    public function archive()
    {
        $results = $this->modelRepository->userArchive($is_customer = true, request(['search']));
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
        $validatedData = $request->validated();
        $allowedColumns = array_keys($validatedData);
        $data = $request->only($allowedColumns);
        $result = $this->modelService->store($data, false);
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
    public function delete(string $id)
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
