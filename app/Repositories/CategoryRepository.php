<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryRepository extends BaseRepository
{
    /**
     * Create a new CategoryRepository instance.
     *
     * @param  App\Models\Category $Category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get Category collection.
     *
     * @param int $limit
     * @return Illuminate\Support\Collection
     */
    public function indexFront($limit) {
        return Category::paginate($limit);
    }

    /**
     * Handle create new Category
     *
     * @param App\Http\Requests\CategoryRequest $request
     * @return boolean
     */
    public function create(CategoryRequest $request) {
        $category = new Category;
        $category->name = $request->name;

        return $category->save();
    }

    /**
     * Handle update Category
     *
     * @param Illuminate\Http\Request $request
     * @param App\Models\Category $Category
     * @return boolean
     */
    public function update(Request $request, Category $category) {

        $category->name = $request->name;

        return $category->save();
    }
}
