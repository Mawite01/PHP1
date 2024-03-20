<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUser(): Collection
    {
        return User::with('roles')->get()->toBase();
    }

    public function create(array $params): User
    {
        return User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);
    }
}
