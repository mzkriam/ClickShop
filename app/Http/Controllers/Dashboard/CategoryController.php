<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Interfaces\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categories;
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
    }
    public function index()
    {
        return $this->categories->index();
    }
    public function create()
    {
        return $this->categories->create();
    }
    public function store(Request $request)
    {
        return $this->categories->store($request);
    }
    public function edit($id)
    {
        return $this->categories->edit($id);
    }
    public function update(StoreCategoryRequest $request)
    {
        return $this->categories->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->categories->destroy($request);
    }
    public function update_status(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1'
        ]);
        return $this->categories->update_status($request);
    }
}
