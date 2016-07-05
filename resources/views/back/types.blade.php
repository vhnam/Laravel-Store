@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/types.title') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-type-add">
            <a href="/admin/types/create">
                <button type="button" class="btn btn-primary">{{ trans('back/types.buttonAdd') }}</button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="types-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ trans('back/types.tableTitleName') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td class="table-type-item-button">
                                <a href="/admin/types/{{ $type->id }}">
                                    <button type="button" class="btn btn-info">{{ trans('back/types.buttonUpdate') }}</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection