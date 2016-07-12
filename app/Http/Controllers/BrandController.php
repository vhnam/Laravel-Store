<?php

namespace App\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException as QueryException;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use App\Repositories\BrandRepository;

class BrandController extends Controller
{

    /**
     * The BrandRepository instance.
     *
     * @var App\Repositories\BrandRepository
     */
    protected $brand_repository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $limit;

    /**
     * Create a new BrandController instance.
     *
     * @param  App\Repositories\BrandRepository $brand_repository
     * @return void
    */
    public function __construct(BrandRepository $brand_repository) {
        $this->limit = 20;
        $this->brand_repository = $brand_repository;
    }

    /**
     * Display list of brands for Back-End.
     *
     * @return Response
     */
    public function showBackendBrands()
    {
        $brands = $this->brand_repository->indexFront($this->limit);

        return view('back.brands')
            ->with('brands', $brands);
    }

    /**
     * Show the form for creating a new brand.
     *
     * @return Response
     */
    public function create()
    {
        return view('back.createBrand');
    }

    /**
     * Handle create a new brand.
     *
     * @param  App\Http\Requests\BrandRequest  $request
     * @return Response
     */
    public function handleCreate(BrandRequest $request)
    {
        try {
            if ($this->brand_repository->create($request)) {

                return redirect('/admin/brands')
                    ->with([
                        'messageType' => 'success',
                        'message' => trans('back/template.messageCreateSuccessfully')
                    ]);
            }

            return redirect('/admin/brands/create')
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageCreateFailed')
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/brands/create')
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageCreateFailed')
                ]);
        }
    }

    /**
     * Show the form for updating a brand.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Brand $brand
     * @return Response
     */
    public function update(Request $request, Brand $brand)
    {
        return view('back.updateBrand')
            ->with('brand', $brand);
    }

    /**
     * Show the form for updating a brand.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Brand $brand
     * @return Response
     */
    public function handleUpdate(Request $request, Brand $brand)
    {
        try {

            if ($this->brand_repository->update($request, $brand)) {

                return redirect('/admin/brands/' . $brand->id)
                ->with([
                    'messageType' => 'success',
                    'message' => trans('back/template.messageUpdateSuccessfully'),
                    'brand' => $brand
                ]);
            }

            return redirect('/admin/brands/' . $brand->id)
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageCreateFailed'),
                    'brand' => $brand
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/brands/' . $brand->id)
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageUpdateFailed'),
                    'brand' => $brand
                ]);
            }
    }
}