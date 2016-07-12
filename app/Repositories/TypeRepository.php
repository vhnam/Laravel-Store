<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Type;
use App\Http\Requests\TypeRequest;

class TypeRepository extends BaseRepository
{
    /**
     * Create a new TypeRepository instance.
     *
     * @param  App\Models\Type $Type
     * @return void
     */
    public function __construct(Type $type)
    {
        $this->model = $type;
    }

    /**
     * Get Type collection.
     *
     * @param int $limit
     * @return Illuminate\Support\Collection
     */
    public function indexFront($limit) {
        return Type::paginate($limit);
    }

    /**
     * Handle create new Type
     *
     * @param App\Http\Requests\TypeRequest $request
     * @return boolean
     */
    public function create(TypeRequest $request) {
        $type = new Type;
        $type->name = $request->name;

        return $type->save();
    }

    /**
     * Handle update Type
     *
     * @param Illuminate\Http\Request $request
     * @param App\Models\Type $Type
     * @return boolean
     */
    public function update(Request $request, Type $type) {

        $type->name = $request->name;

        return $type->save();
    }
}
