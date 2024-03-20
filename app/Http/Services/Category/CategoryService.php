<?php

namespace App\Http\Services\Category;

use App\Http\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\UploadedFile;

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
        $params['image'] = $this->imagesUpload($params);

        $this->categoryRepository->store($params);
    }

    private function imagesUpload(array $params): array
    {
        $uploadedImages = [];
        foreach ($params['image'] as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('/uploadedimages'), $imageName);

            array_push($uploadedImages, $imageName);
        }
        return $uploadedImages;
    }

    private function imageUpload(array $params): string
    {
        $imageName = time() . '.' . $params['image']->getClientOriginalExtension();

        $params['image']->move(public_path('/uploadedimages'), $imageName);

        return $imageName;
    }

    public function findById(int $id): Category
    {
        return $this->categoryRepository->findById($id);
    }
}
