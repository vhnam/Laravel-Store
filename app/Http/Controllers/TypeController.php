<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException as QueryException;

use App\Models\Type;
use App\Http\Requests\TypeRequest;
use App\Repositories\TypeRepository;

class TypeController extends Controller
{

    /**
     * The TypeRepository instance.
     *
     * @var App\Repositories\TypeRepository
     */
    protected $type_repository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $limit;

    /**
     * Create a new TypeController instance.
     *
     * @param  App\Repositories\TypeRepository $type_repository
     * @return void
    */
    public function __construct(TypeRepository $type_repository) {
        $this->limit = 20;
        $this->type_repository = $type_repository;
    }

    /**
     * Display list of types for Back-End.
     *
     * @return Response
     */
    public function showBackendTypes()
    {
        $types = $this->type_repository->indexFront($this->limit);

        return view('back.types')
            ->with('types', $types);
    }

    /**
     * Show the form for creating a new type.
     *
     * @return Response
     */
    public function create()
    {
        return view('back.createType');
    }

    /**
     * Handle create a new type.
     *
     * @param  App\Http\Requests\TypeRequest  $request
     * @return Response
     */
    public function handleCreate(TypeRequest $request)
    {
        try {
            if ($this->type_repository->create($request)) {
                return redirect('/admin/types')
                    ->with([
                        'messageType' => 'success',
                        'message' => trans('back/template.messageCreateSuccessfully')
                    ]);
            }

            return redirect('/admin/types/create')
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageCreateFailed')
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/types/create')
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageCreateFailed')
                ]);
        }
    }

    /**
     * Show the form for updating a type.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Type $type
     * @return Response
     */
    public function update(Request $request, Type $type)
    {
        return view('back.updateType')
            ->with('type', $type);
    }

    /**
     * Show the form for updating a type.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Type $type
     * @return Response
     */
    public function handleUpdate(Request $request, Type $type)
    {
        try {
            if ($this->type_repository->update($request, $type)) {
                return redirect('/admin/types/' . $type->id)
                ->with([
                    'messageType' => 'success',
                    'message' => trans('back/template.messageUpdateSuccessfully'),
                    'type' => $type
                ]);
            }

            return redirect('/admin/types/' . $type->id)
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageUpdateFailed'),
                    'type' => $type
                ]);
        } catch(QueryException $e) {
            return redirect('/admin/types/' . $type->id)
                ->with([
                    'messageType' => 'danger',
                    'message' => trans('back/template.messageUpdateFailed'),
                    'type' => $type
                ]);
        }
    }
}