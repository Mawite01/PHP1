<?php

namespace App\Http\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index(): Collection
    {
        return Category::with('categoryImages')->get()->toBase();
    }

    public function store($params)
    {
        // Category::create([
        //     'name' => $params['name'],
        //     'description' => $params['description'],
        //     'image' => $params['image'],
        //     'status' => $params['status']
        // ]);

        return Category::create($params);
    }

    public function findById(int $id): Category
    {
        return Category::find($id);
    }
}