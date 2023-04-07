<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Utils\Response\ResponseServiceInterface;
use App\Http\Requests\User\AdminRequest as ModelRequest;
use App\Http\Resources\AdministratorResource;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelRepository;
    private $responseService;
    private $name = 'User';
    
    public function __construct(
        UserRepositoryInterface $modelRepository, 
        ResponseServiceInterface $responseService
    ) {
        $this->modelRepository = $modelRepository;
        $this->responseService = $responseService;
    }

    public function index()
    {
        $results = $this->modelRepository->userLists($is_customer = false, request(['search']), ['role']);
        return $this->responseService->successResponse($this->name, $results);
    }

    public function archive()
    {
        $results = $this->modelRepository->userArchive($is_customer = false, request(['search']), ['role']);
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

        $result = $this->modelRepository->userCreate($data, true);
        return $this->responseService->storeResponse($this->name, new AdministratorResource($result));
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
        return $this->responseService->successResponse($this->name, new AdministratorResource($result));
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
        return $this->responseService->updateResponse($this->name, new AdministratorResource($result));
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
        return $this->responseService->successResponse($this->name, new AdministratorResource($result));
    }

    public function restore(string $id)
    {
        $result = $this->modelRepository->restore($id);
        return $this->responseService->successResponse($this->name, new AdministratorResource($result));
    }

}