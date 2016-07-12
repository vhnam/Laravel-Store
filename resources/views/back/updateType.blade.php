@extends('vendor.back')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('back/types.titleUpdate') }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <form method="post" action="/admin/types/{{ $type->id }}" role="form" autocomplete="off">
                <div class="form-group">
                    <label>{{ trans('back/types.formOldName') }}</label>
                    <div class="form-control form-disabled">{{ $type->name }}</div>
                </div>
                <div class="form-group">
                    <label>{{ trans('back/types.formNewName') }}</label>
                    <input class="form-control" name="name" spellcheck="false" required="true" type="text" value="{{ $type->name }}">
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