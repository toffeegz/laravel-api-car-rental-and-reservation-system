<?php

namespace App\Repositories\User;

use App\Repositories\Base\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function userLists(bool $is_customer = true, array $search = [], array $relations = [], string $sortByColumn = 'created_at', string $sortBy = 'ASC');
    public function userArchive(bool $is_customer = true, array $search = [], array $relations = [], string $sortByColumn = 'created_at', string $sortBy = 'ASC');
    public function getByEmail(string $email);
}
