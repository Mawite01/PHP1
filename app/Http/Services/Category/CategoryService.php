<?php

namespace App\Http\Services\Category;

use App\Http\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function index()
    {
        return $this->categoryRepository->index();
    }
    
    public function store(array $params)
    {
        // $this->imageUpload($params);
    
        
        $imageName = time().'.'.$params['image']->getClientOriginalExtension();
        
        $params['image']->move(public_path('/uploadedimages'), $imageName);
        
        $params['image'] = $imageName;

        return $this->categoryRepository->store($params);
    }

    private function imageUpload(array $params)
    {
        $imageName = time().'.'.$params['image']->getClientOriginalExtension();

        $params['image']->move(public_path('/uploadedimages'), $imageName);
    }

    public function findById(int $id): Category
    {   
        return $this->categoryRepository->findById($id);
    }
}