@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/brands.titleUpdate') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <form method="post" action="/admin/brands/{{ $brand->id }}" enctype="multipart/form-data" role="form" autocomplete="off">
                <div class="form-group">
                    <label>{{ trans('back/brands.formOldName') }}</label>
                    <div class="form-control form-disabled">{{ $brand->name }}</div>
                </div>
                <div class="form-group">
                    <label>{{ trans('back/brands.formNewName') }}</label>
                    <input class="form-control" name="name" spellcheck="false" type="text" value="{{ $brand->name }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('back/brands.formDescription') }}</label>
                    <textarea class="form-control" name="description" spellcheck="false" placeholder="{{ trans('back/brands.formDescription') }}">{{ $brand->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>{{ trans('back/brands.formPhoto') }}</label>
                    <div class="form-photo">
                        <img src="{{ asset('brands/' . $brand->photo) }}" alt="{{ $brand->photo }}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" name="photo">
                </div>
                {{ csrf_field() }}
                <a href="/admin/brands">
                    <button type="button" class="btn btn-default">{{ trans('back/brands.formBack') }}</button>
                </a>
                <button type="submit" class="btn btn-success">{{ trans('back/brands.formAccept') }}</button>
            </form>
            @if (session()->has('message'))
                @include('partials/message', [
                    'type' => session('messageType'),
                    'message' => session('message')
                ]);
            @endif
        </div>
        <div class="col-lg-6"></div>
    </div>
</div>

@endsection