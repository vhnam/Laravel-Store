@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/brands.titleCreate') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <form method="post" action="/admin/brands/create" enctype="multipart/form-data" autocomplete="off" role="form">
                <div class="form-group">
                    <label>{{ trans('back/brands.formName') }}</label>
                    <input class="form-control" name="name" type="text" spellcheck="false" placeholder="{{ trans('back/brands.formName') }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('back/brands.formDescription') }}</label>
                    <textarea class="form-control" name="description" spellcheck="false" placeholder="{{ trans('back/brands.formDescription') }}"></textarea>
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
        <div class="col-lg-6">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection