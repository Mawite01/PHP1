<?php

namespace App\Http\Repositories\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try{
            $category =  Category::create($params);

            foreach ($params['image'] as $image) {
                $category->categoryImages()->sdf(['image' => $image]);
            }
            DB::commit();
        }catch(Exception $e)
        {
            DB::rollBack();

        }
        

        return $category;
    }

    public function findById(int $id): Category
    {
        return Category::find($id);
    }
}
