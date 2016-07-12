<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException as QueryException;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    /**
     * The CategoryRepository instance.
     *
     * @var App\Repositories\CategoryRepository
     */
    protected $category_repository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $limit;

    /**
     * Create a new CategoryController instance.
     *
     * @param  App\Repositories\CategoryRepository $category_repository
     * @return void
    */
    public function __construct(CategoryRepository $category_repository) {
        $this->limit = 20;
        $this->category_repository = $category_repository;
    }

    /**
     * Display list of categories for Back-End.
     *
     * @return Response
     */
    public function showBackendCategories()
    {
        $categories = $this->category_repository->indexFront($this->limit);

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
     * @param  App\Http\Requests\CategoryRequest  $request
     * @return Response
     */
    public function handleCreate(CategoryRequest $request)
    {
        try {
            if ($this->category_repository->create($request)) {
                return redirect('/admin/categories')
                    ->with([
                        'messageType' => 'success',
                        'message' => trans('back/template.messageCreateSuccessfully')
                    ]);
            }

            return redirect('/admin/categories/create')
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageCreateFailed')
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/categories/create')
                ->with([
                    'messageType' => 'danger',
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
            if ($this->category_repository->update($request, $category)) {
                return redirect('/admin/categories/' . $category->id)
                    ->with([
                        'messageType' => 'success',
                        'message' => trans('back/template.messageUpdateSuccessfully'),
                        'category' => $category
                    ]);
            }

            return redirect('/admin/categories/' . $category->id)
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageUpdateFailed'),
                    'category' => $category
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/categories/' . $category->id)
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageUpdateFailed'),
                    'category' => $category
                ]);
        }
    }
}