<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('admin.categories.index')
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|min:1|max:20|unique:categories,name',
        ]);

        $this->category->name = $request->category;
        $this->category->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->category->destroy($id);
        return redirect()->back();
    }
}
