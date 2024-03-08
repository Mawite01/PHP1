<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string'],
            'description' => ['required', 'string'],
            'status' => ['boolean']
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        // DB::table('categories')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'status' => $request->status
        // ]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

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

        Category::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
    ]);

        return redirect()->route('categories.index');
    
    }

    public function delete($id)
    {
        Category::where('id',$id)->delete();
        DB::table('categories')->where('id',$id)->delete();
        
       return redirect()->route('categories.index');
    }
}
