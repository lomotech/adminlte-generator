<?php

namespace App\Http\Controllers\Zz;

use App\DataTables\Zz\CategoryDataTable;
use App\Http\Requests\Zz\CreateCategoryRequest;
use App\Http\Requests\Zz\UpdateCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Zz\Category;
use Illuminate\Http\Request;
use Flash;

class CategoryController extends AppBaseController
{
    /**
     * Display a listing of the Category.
     */
    public function index(CategoryDataTable $categoryDataTable)
    {
    return $categoryDataTable->render('zz.categories.index');
    }


    /**
     * Show the form for creating a new Category.
     */
    public function create()
    {
        return view('zz.categories.create');
    }

    /**
     * Store a newly created Category in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        /** @var Category $category */
        $category = Category::create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('zz.categories.index'));
    }

    /**
     * Display the specified Category.
     */
    public function show($id)
    {
        /** @var Category $category */
        $category = Category::find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('zz.categories.index'));
        }

        return view('zz.categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     */
    public function edit($id)
    {
        /** @var Category $category */
        $category = Category::find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('zz.categories.index'));
        }

        return view('zz.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        /** @var Category $category */
        $category = Category::find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('zz.categories.index'));
        }

        $category->fill($request->all());
        $category->save();

        Flash::success('Category updated successfully.');

        return redirect(route('zz.categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Category $category */
        $category = Category::find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('zz.categories.index'));
        }

        $category->delete();

        Flash::success('Category deleted successfully.');

        return redirect(route('zz.categories.index'));
    }
}
