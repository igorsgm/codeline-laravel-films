@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Films')

@section('content_header')
    <h1 class="pull-left">Films</h1>
    <h1 class="pull-right">
        <a class="btn btn-success pull-left" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('films.create') !!}">Create film</a>
    </h1>
@stop

@section('content')

    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            @include('films.table')
        </div>
    </div>
@endsection
