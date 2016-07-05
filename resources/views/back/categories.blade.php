@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/categories.title') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-category-add">
            <a href="/admin/categories/create">
                <button type="button" class="btn btn-primary">{{ trans('back/categories.buttonAdd') }}</button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="categories-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ trans('back/categories.tableTitleName') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="table-category-item-button">
                                <a href="/admin/categories/{{ $category->id }}">
                                    <button type="button" class="btn btn-info">{{ trans('back/categories.buttonUpdate') }}</button>
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