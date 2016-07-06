@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/brands.title') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @if (session()->has('message'))
            @include('partials/message', [
                'type' => session('messageType'),
                'message' => session('message')
            ]);
        @endif
        <div class="table-brand-add">
            <a href="/admin/brands/create">
                <button type="button" class="btn btn-primary">{{ trans('back/brands.buttonAdd') }}</button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="brands-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ trans('back/brands.tableTitleName') }}</th>
                        <th>{{ trans('back/brands.tableTitlePhoto') }}</th>
                        <th>{{ trans('back/brands.tableTitleDescription') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td class="table-brand-item-name">{{ $brand->name }}</td>
                            <td class="table-brand-item-brand">
                                <img src="{{ asset('brands/' . $brand->photo) }}" alt="{{ $brand->name }}">
                            </td>
                            <td>{{ $brand->description }}</td>
                            <td>
                                <a href="/admin/brands/{{ $brand->id }}">
                                    <button type="button" class="btn btn-info">{{ trans('back/brands.buttonUpdate') }}</button>
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