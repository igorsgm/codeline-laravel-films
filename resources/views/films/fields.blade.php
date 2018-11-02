<div class="content">
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

    <!-- Country Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('country_id', 'Country:') !!}
        {!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5, 'cols' => 5]) !!}
    </div>

    <!-- Rating Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('rating', 'Rating:') !!}
        {!! Form::number('rating', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Ticket Price Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('ticket_price', 'Ticket Price (USD):') !!}
        {!! Form::number('ticket_price', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Image Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('image_file', 'Image:') !!}
        {!! Form::file('image_file', ['accept' => "image/jpeg,image/png"]) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('films.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>