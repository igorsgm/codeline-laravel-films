<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $film->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $film->description !!}</p>
</div>

<!-- Release Date Field -->
<div class="form-group">
    {!! Form::label('release_date', 'Release Date:') !!}
    <p>{!! $film->release_date !!}</p>
</div>

<!-- Rating Field -->
<div class="form-group">
    {!! Form::label('rating', 'Rating:') !!}
    <p>{!! $film->rating !!}</p>
</div>

<!-- Ticket Price Field -->
<div class="form-group">
    {!! Form::label('ticket_price', 'Ticket Price (USD):') !!}
    <p>{!! $film->ticket_price !!}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{!! $film->country->name !!}</p>
</div>

<!-- Genres-->
<div class="form-group">
    {!! Form::label('genres', 'Genres:') !!}
    <p>{!! implode(', ', $film->genres->pluck('name')->toArray()) !!}</p>
</div>

