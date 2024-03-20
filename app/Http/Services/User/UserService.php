<?php

namespace App\Http\Services\User;

use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    private $userRepository;

    private $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(): Collection
    {
        return $this->userRepository->getUser();
    }

    public function store(array $params): void
    {
        $role = $this->roleRepository->findId($params['role_id']);
        
        $user = $this->userRepository->create($params);

        $user->assignRole($role);
    }
}