@extends('adminlte::page')

@section('title', 'Codeline LaravelFilms - Films')

@section('content_header')
    <h1 class="pull-left">Films</h1>
@stop

@section('content')

    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body justify-content-center">
            <div class="container">
                <div class="row">
                    @foreach($films as $film)
                        <div class="col-md-12">
                            <div class="panel panel-default  panel--styled">
                                <div class="panel-body">
                                    <div class="col-md-12 panelTop">
                                        <div class="col-md-4">
                                            <img class="film-image-cover" src="{{url($film->image_path)}}" alt=""/>
                                        </div>
                                        <div class="col-md-8">
                                            <h2>{{$film->name}} <span class="film-year">({{$film->release_date->format('Y')}})</span></h2>
                                            <div>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <span class="star-rating fa fa-star {{ $film->rating >= $i  ? 'checked' : ''}}"></span>
                                                @endfor
                                            </div>
                                            <br>
                                            <p>{{$film->description}}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12 panelBottom">
                                        <div class="col-md-4 text-center">
                                            <a href="{!! route('films.show', [$film->id]) !!}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-info-sign"></span> More info</a>
                                            <a href="{!! route('films.edit', [$film->id]) !!}" class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        </div>
                                        <div class="col-md-4 text-left">
                                            <h5>Ticket Price <span class="itemPrice">$ {{$film->ticket_price}}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h1 class="pull-left">
                    <a class="btn btn-lg btn-success" href="{!! route('films.create') !!}">Create new film</a>
                </h1>
                <div class="pull-right">
                    {!! $films->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
