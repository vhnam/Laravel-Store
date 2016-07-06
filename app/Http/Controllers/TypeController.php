<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException as QueryException;
use App\Models\Type;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{

    /**
     * Display list of types for Back-End.
     *
     * @return Response
     */
    public function showBackendTypes()
    {
        $types = Type::paginate(20);

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
            $type = new Type;
            $type->name = $request->name;
            $type->save();

            return redirect('/admin/types')
                ->with([
                    'messageType' => 'success',
                    'message' => trans('back/template.messageCreateSuccessfully')
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
            $type->name = $request->typeNewName;
            $type->save();

            return redirect('/admin/types/' . $type->id)
                ->with([
                    'messageType' => 'success',
                    'message' => trans('back/template.messageUpdateSuccessfully'),
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