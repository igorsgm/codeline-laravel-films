@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Edit Film')

@section('content_header')
    <h1>
        Edit - {{$film->name}}
    </h1>
@stop

@section('content')
    @include('adminlte::partials.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{$film->image_path}}" class="film-image">
                </div>

                <div class="col-sm-8">
                    {!! Form::model($film, ['route' => ['films.update', $film->id], 'method' => 'patch', 'files' => true]) !!}

                    @include('films.fields')

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection