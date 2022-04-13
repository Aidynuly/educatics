<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Русский') }}
            {{ Form::text('ru', App\Models\Translate::whereId($school->name)->value('en'), ['class' => 'form-control' . ($errors->has('ru') ? ' is-invalid' : ''), 'placeholder' => 'Русский']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Английский') }}
            {{ Form::text('en', App\Models\Translate::whereId($school->name)->value('ru'), ['class' => 'form-control' . ($errors->has('en') ? ' is-invalid' : ''), 'placeholder' => 'Английский']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Казахский') }}
            {{ Form::text('kz', App\Models\Translate::whereId($school->name)->value('kz'), ['class' => 'form-control' . ($errors->has('kz') ? ' is-invalid' : ''), 'placeholder' => 'Казахский']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>')!!}
        </div>

        <div class="form-group">
            {{ Form::label('city_id') }}
            {{ Form::text('city_id', $school->city_id, ['class' => 'form-control' . ($errors->has('city_id') ? ' is-invalid' : ''), 'placeholder' => 'City Id']) }}
            {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
