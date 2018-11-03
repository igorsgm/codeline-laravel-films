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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 panelTop">
                        <div class="col-md-3">
                            <img class="film-image-cover" src="{{url($film->image_path)}}" alt=""/>
                        </div>
                        <div class="col-md-9">
                            <h2>{{$film->name}} <span class="film-year">({{Carbon\Carbon::parse($film->release_date)->format('Y')}})</span></h2>
                            <div>
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star-rating fa fa-star {{ $film->rating >= $i  ? 'checked' : ''}}"></span>
                                @endfor
                            </div>
                            <br>

                            <h4><strong>Release Date:</strong> {{Carbon\Carbon::parse($film->release_date)->format('d/m/Y')}}</h4>
                            <h4><strong>Country:</strong> {!! $film->country->name !!}</h4>
                            <h4><strong>Genres:</strong> {!! implode(', ', $film->genres->pluck('name')->toArray()) !!}</h4>
                            <h4><strong>Ticket Price:</strong> $ {!! $film->ticket_price !!}</h4>
                            <br>
                            <h4><strong>Description:</strong></h4>
                            {!! $film->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
