<?php

namespace App\Http\Controllers\Backend;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $panel='Category';
        $records=Category::all();
        return view('backend.category.index',compact('panel','records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $panel='Category';
        return view ('backend.category.create',compact('panel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->only(['title', 'slug', 'rank', 'icon', 'description', 'status']);

        // Handle image file
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/category'), $filename);
            $data['image'] = $filename;
        }

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        $record = Category::create($data);

        if ($record) {
            return redirect()->route('backend.category.index')->with('success', 'Category created successfully');
        } else {
            return redirect()->route('backend.category.create')->with('error', 'Category creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $panel="Category";
        $record=$category;
        return view('backend.category.show',compact('panel','record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
