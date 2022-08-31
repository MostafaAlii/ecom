<?php
namespace App\Http\Repositories;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Interfaces\CategoryInterface;
class CategoryRepository implements CategoryInterface {
    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index() {
        $categories = Category::orderByRaw('FIELD(status, "active", "pending", "notactive")')->latest()->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store($request) {
        $this->category->create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
        ]);
        $notification = array(
            'message' => trans('dashboard/category.category_created_successfully'),
            'alert-type' => 'success'
        );
        return redirect()->route('Categories.index')->with($notification);
    }    
}