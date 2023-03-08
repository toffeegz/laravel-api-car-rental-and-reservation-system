<?php

namespace App\Repositories\Customer;

use App\Repositories\Base\BaseRepositoryInterface;

interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    //
    public function register(array $attributes, $id);
}
