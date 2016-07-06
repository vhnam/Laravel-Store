@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/categories.titleUpdate') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <form method="post" action="/admin/categories/{{ $category->id }}" role="form">
                <div class="form-group">
                    <label>{{ trans('back/categories.formOldName') }}</label>
                    <div class="form-control form-disabled">{{ $category->name }}</div>
                </div>
                <div class="form-group">
                    <label>{{ trans('back/categories.formNewName') }}</label>
                    <input class="form-control" name="categoryNewName" type="text" value="{{ $category->name }}">
                </div>
                {{ csrf_field() }}
                <a href="/admin/categories">
                    <button type="button" class="btn btn-default">{{ trans('back/categories.formBack') }}</button>
                </a>
                <button type="submit" class="btn btn-success">{{ trans('back/categories.formAccept') }}</button>
            </form>
            @if (session()->has('message'))
                @include('partials/message', [
                    'type' => session('type'),
                    'message' => session('message')
                ]);
            @endif
        </div>
        <div class="col-lg-6"></div>
    </div>
</div>

@endsection