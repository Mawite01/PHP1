<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        if (!Gate::allows('category_list')) {
            return abort(401);
        }
        $categories = $this->categoryService->index();

        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        if (!Gate::allows('category_create')) {
            return abort(401);
        }

        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        if (!Gate::allows('category_create')) {
            return abort(401);
        }

        $this->categoryService->store($request->validated());
        
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        if (!Gate::allows('category_edit')) {
            return abort(401);
        }

        $category = $this->categoryService->findById($id);

        return view('categories.edit',compact('category'));
    }

    public function  update(Request $request ,$id)
    {
        // $category = Category::find($id);

        // $category->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'status' => $request->status
        // ]);
        if (!Gate::allows('category_edit')) {
            return abort(401);
        }

        Category::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
    ]);

        return redirect()->route('categories.index');
    
    }

    public function delete($id)
    {
        if (!Gate::allows('category')) {
            return abort(401);
        }

        Category::where('id',$id)->delete();
        DB::table('categories')->where('id',$id)->delete();
        
       return redirect()->route('categories.index');
    }
}
