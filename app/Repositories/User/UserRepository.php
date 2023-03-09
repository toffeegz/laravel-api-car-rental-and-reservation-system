<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Log;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function userLists(bool $is_customer = true, array $search = [], array $relations = [], string $sortByColumn = 'created_at', string $sortBy = 'ASC')
    {
        $this->model = $is_customer === true ? $this->model->whereNull('role_id') : $this->model->whereNotNull('role_id');
        
        if($relations) {
            $this->model = $this->model->with($relations);
        }

        return $this->model->filter($search)->orderBy($sortByColumn, $sortBy)->paginate(request('limit') ?? 10);
    }

    public function userArchive(bool $is_customer = true, array $search = [], array $relations = [], string $sortByColumn = 'created_at', string $sortBy = 'ASC')
    {
        $this->model = $this->model->onlyTrashed();
        $this->model = $is_customer === true ? $this->model->whereNull('role_id') : $this->model->whereNotNull('role_id');
        
        if($relations) {
            $this->model = $this->model->with($relations);
        }

        return $this->model->filter($search)->orderBy($sortByColumn, $sortBy)->paginate(request('limit') ?? 10);
    }

    public function getByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function getByToken(string $token)
    {
        return $this->model->where('verification_token', $token)->first();
    }
}
