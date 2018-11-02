@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Genres')

@section('content_header')
    <h1 class="pull-left">Genres</h1>
@stop

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('genres.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

