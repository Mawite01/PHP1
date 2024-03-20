<?php

namespace App\Http\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function index(): Collection;

    public function store(array $params);

    public function findById(int $id): Category;
}