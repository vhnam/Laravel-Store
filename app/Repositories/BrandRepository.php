<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandRepository extends BaseRepository
{
    /**
     * Create a new BrandRepository instance.
     *
     * @param  App\Models\Brand $brand
     * @return void
     */
    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }

    /**
     * Get brand collection.
     *
     * @param int $limit
     * @return Illuminate\Support\Collection
     */
    public function indexFront($limit) {
        return Brand::paginate($limit);
    }

    /**
     * Handle create new brand
     *
     * @param App\Http\Requests\BrandRequest $request
     * @return boolean
     */
    public function create(BrandRequest $request) {
        $file = $request->file('photo');

        if ($file && $file->isValid()) {
            $fileName = strtolower($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move('brands', $fileName);

            $brand = new Brand;
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->photo = $fileName;
            $brand->save();

            return true;
        }

        return false;
    }

    /**
     * Handle update brand
     *
     * @param Illuminate\Http\Request $request
     * @param App\Models\Brand $brand
     * @return boolean
     */
    public function update(Request $request, Brand $brand) {
        $file = $request->file('photo');

        if ($file) {
            if ($file->isValid()) {
                $fileName = strtolower($request->name) . '.' . $file->getClientOriginalExtension();
                $file->move('brands', $fileName);

                $brand->photo = $fileName;
            } else {
                return false;
            }
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        return true;
    }
}
