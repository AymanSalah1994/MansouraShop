<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index () {
        $categories = Category::all() ;
        return view('admin.category.index' , compact('categories')) ;
    }

    public function create() {
        return view('admin.category.create') ;
    }

    public function store(CategoryRequest $request) {
        // TODO : Making the Error Messages in The View ;
        $allRequestData = $request->handleRequest() ;
        Category::create($allRequestData);
        return redirect()->route('admin.dashboard') ;
    }
    public function edit($id) {
        $category = Category::findOrFail($id) ;
        return view('admin.category.edit' , compact('category')) ;
    }

    public function update($id , CategoryUpdateRequest $request) {
        //TODO : Handle Update Request
        $allRequestedData = $request->handleRequest($id) ;
        $category = Category::find($id) ;
        $category->update($allRequestedData) ;
        return redirect()->route('categories.index') ;
    }

    public function delete($id) {
        $category = Category::find($id) ;
        $category->delete() ;
        return redirect()->route('categories.index') ;
    }
}
