<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Support\Carbon;
use App\Repositories\Base\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{

    /**
     * CustomerRepository constructor.
     *
     * @param Customer $model
     */

    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    public function register(array $attributes, $id)
    {
        $attributes['status'] = Customer::PENDING;

        return $this->model->create($attributes);
    }
}
