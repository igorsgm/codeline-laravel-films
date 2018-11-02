@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Countries')

@section('content_header')
    <h1 class="pull-left">Countries</h1>
@stop

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('countries.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

