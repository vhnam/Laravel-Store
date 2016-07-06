<?php

namespace App\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException as QueryException;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{

    /**
     * Display list of brands for Back-End.
     *
     * @return Response
     */
    public function showBackendBrands()
    {
        $brands = Brand::paginate(20);

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

            $file = $request->file('photo');

            if ($file && $file->isValid()) {
                $fileName = strtolower($request->name) . '.' . $file->getClientOriginalExtension();
                $file->move('brands', $fileName);

                $brand = new Brand;
                $brand->name = $request->name;
                $brand->description = $request->description;
                $brand->photo = $fileName;
                $brand->save();

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
            $file = $request->file('photo');

            if ($file && $file->isValid()) {
                $fileName = strtolower($request->name) . '.' . $file->getClientOriginalExtension();
                $file->move('brands', $fileName);

                $brand->name = $request->name;
                $brand->description = $request->description;
                $brand->photo = $fileName;
                $brand->save();

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