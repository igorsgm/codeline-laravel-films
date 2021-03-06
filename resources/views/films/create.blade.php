@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Create Film')

@section('content_header')
    <h1>
        Create new Film
    </h1>
@stop

@section('content')
    <div class="content">
        @include('adminlte::partials.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'films.store', 'files' => true]) !!}

                    @include('films.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
