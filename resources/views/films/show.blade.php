@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Film')

@section('content_header')
    <h1>
        Film - {{$film->name}}
    </h1>

@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                <div class="col-sm-4">
                    <img src="{{$film->image_path}}" class="film-image">
                </div>
                <div class="col-sm-8">
                    @include('films.show_fields')
                    <a href="{!! route('films.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
