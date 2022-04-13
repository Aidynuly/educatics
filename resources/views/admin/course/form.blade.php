<div class="box box-info padding-1">
    <div class="box-body">
        <label>Название</label>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('Русский') }}
                {{ Form::text('title_ru', App\Models\Translate::whereId($course->title)->value('en'), ['class' => 'form-control' . ($errors->has('ru') ? ' is-invalid' : ''), 'placeholder' => 'Русский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Английский') }}
                {{ Form::text('title_en', App\Models\Translate::whereId($course->title)->value('ru'), ['class' => 'form-control' . ($errors->has('en') ? ' is-invalid' : ''), 'placeholder' => 'Английский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Казахский') }}
                {{ Form::text('title_kz', App\Models\Translate::whereId($course->title)->value('kz'), ['class' => 'form-control' . ($errors->has('kz') ? ' is-invalid' : ''), 'placeholder' => 'Казахский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>')!!}
            </div>
        </div>
        <label>Описание</label>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('Русский') }}
                {{ Form::text('description_ru', App\Models\Translate::whereId($course->description)->value('en'), ['class' => 'form-control' . ($errors->has('ru') ? ' is-invalid' : ''), 'placeholder' => 'Русский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('Английский') }}
                {{ Form::text('description_en', App\Models\Translate::whereId($course->description)->value('ru'), ['class' => 'form-control' . ($errors->has('en') ? ' is-invalid' : ''), 'placeholder' => 'Английский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('Казахский') }}
                {{ Form::text('description_kz', App\Models\Translate::whereId($course->description)->value('kz'), ['class' => 'form-control' . ($errors->has('kz') ? ' is-invalid' : ''), 'placeholder' => 'Казахский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>')!!}
            </div>
        </div>

        <div class="form-group">
            {{Form::label('Выберите файл, чтобы загрузить сертификат')}}
            {{Form::file('certificate', ['class' => 'form-control' . ($errors->has('kz') ? ' is-invalid' : ''), 'placeholder' => 'Сертификат' ])}}
            {!! $errors->first('certificate', '<div class="invalid-feedback">:message</div>')!!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
