@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Edit Film')

@section('content_header')
    <h1>
        Film
    </h1>
@stop

@section('content')
    @include('adminlte::partials.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($film, ['route' => ['films.update', $film->id], 'method' => 'patch']) !!}

                @include('films.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection