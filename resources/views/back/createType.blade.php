@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/types.titleCreate') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <form method="post" action="/admin/types/create" role="form">
                <div class="form-group">
                    <label>{{ trans('back/types.formName') }}</label>
                    <input class="form-control" name="name" type="text" placeholder="{{ trans('back/types.formName') }}">
                </div>
                {{ csrf_field() }}
                <a href="/admin/types">
                    <button type="button" class="btn btn-default">{{ trans('back/types.formBack') }}</button>
                </a>
                <button type="submit" class="btn btn-success">{{ trans('back/types.formAccept') }}</button>
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