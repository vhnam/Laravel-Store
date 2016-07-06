<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException as QueryException;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    /**
     * Display list of categories for Back-End.
     *
     * @return Response
     */
    public function showBackendCategories()
    {
        $categories = Category::paginate(20);

        return view('back.categories')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Response
     */
    public function create()
    {
        return view('back.createCategory');
    }

    /**
     * Handle create a new category.
     *
     * @return Response
     */
    public function handleCreate(CategoryRequest $request)
    {
        try {
            $category = new Category;
            $category->name = $request->name;
            $category->save();

            return redirect('/admin/categories')
                ->with([
                    'type' => 'success',
                    'message' => trans('back/template.messageCreateSuccessfully')
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/categories/create')
                ->with([
                    'type' => 'danger',
                    'message' => trans('back/template.messageCreateFailed')
                ]);
        }
    }

    /**
     * Show the form for updating a category.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        return view('back.updateCategory')
            ->with('category', $category);
    }

    /**
     * Show the form for updating a category.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Category $category
     * @return Response
     */
    public function handleUpdate(Request $request, Category $category)
    {
        try {
            $category->name = $request->categoryNewName;
            $category->save();

            return redirect('/admin/categories/' . $category->id)
                ->with([
                    'type' => 'success',
                    'message' => trans('back/template.messageUpdateSuccessfully'),
                    'category' => $category
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/categories/' . $category->id)
                ->with([
                    'type' => 'danger',
                    'message' => trans('back/template.messageUpdateFailed'),
                    'category' => $category
                ]);
            }
    }
}