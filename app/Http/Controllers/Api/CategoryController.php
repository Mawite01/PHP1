<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $category = $this->categoryService->index();

        return response()->json([
            'status' => 200,
            'message' => 'Categoy List',
            'data' => $category
        ]);
    }

    public function store(Request $request)
    {
        $category = $this->categoryService->store($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Category Create',
            'data' => $category
        ]);
    }
}