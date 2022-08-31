<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\CategoryInterface;
class CategoryController extends Controller {
    public function __construct(CategoryInterface $category)  {
        $this->category = $category;
    }

    public function index() {
        return $this->category->index();
    }

    public function store(Request $request) {
        return $this->category->store($request);
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
