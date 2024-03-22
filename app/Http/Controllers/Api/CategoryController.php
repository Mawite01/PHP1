<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Matcher\Not;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends BaseApiController
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $category = $this->categoryService->index();

        return $this->success($category, 'Category list', 200);
    }

    public function store(CategoryRequest $request)
    {
        try{
            $category = $this->categoryService->store($request->all());
            return $this->success($category, 'Category Create', 201);

        }catch(Exception $e)
        {
            Log::error($e->getMessage());

            return $this->error($category, '', 500);
        }
    }

    public function show(int $id)
    {
        $categoryId = $this->categoryService->findById($id);

        return $categoryId ? $this->success($categoryId, 'Category Create', 201) : $this->error($categoryId, 'Category Id NOt found', 404);
        
    }
}