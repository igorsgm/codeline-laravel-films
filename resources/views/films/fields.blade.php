<div class="content">

    <div class="row">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Release Date Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('release_date', 'Release Date:') !!}
            {!! Form::date('release_date', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Country Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('country_id', 'Country:') !!}
            {!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <!-- Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 5]) !!}
        </div>
    </div>

    <div class="row">

        <!-- Genres Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('genres', 'Genres', ['class' => 'control-label']) !!}
            {!! Form::select('genres[]', $genres, old('genres') ? old('genres') : null, ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
        </div>

        <!-- Rating Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('rating', 'Rating:') !!}
            {!! Form::number('rating', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Ticket Price Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('ticket_price', 'Ticket Price (USD):') !!}
            {!! Form::number('ticket_price', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <!-- Image Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('image_path', 'Image:') !!}
            {!! Form::file('image_path', ['accept' => "image/jpeg,image/png"]) !!}
        </div>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('films.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>