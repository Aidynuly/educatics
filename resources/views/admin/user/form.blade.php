<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('type') }}
{{--            {{ Form::text('type', $user->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}--}}
{{--            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}--}}
            {{ Form::select('type', ['parent' => 'Родитель', 'children' => 'Ребенок'], null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : '')]) }}
        </div>
        <div class="form-group">
{{--            {{ Form::label('Тариф') }}--}}
{{--            {{ Form::text('tariff_id', $user->tariff_id, ['class' => 'form-control' . ($errors->has('tariff_id') ? ' is-invalid' : ''), 'placeholder' => 'Tariff Id']) }}--}}
{{--            {!! $errors->first('tariff_id', '<div class="invalid-feedback">:message</div>') !!}--}}
            <label for="tariff_id">Тариф </label>
            <select name="tariff_id" class="form-control" name="tariff_id">
                @foreach($tariffs as $tariff)
                    <option value="{{$tariff->id}}">{{\App\Models\Translate::whereId($tariff->title)->value('ru')}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('age') }}
            {{ Form::text('age', $user->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''), 'placeholder' => 'Age']) }}
            {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('login') }}
            {{ Form::text('login', $user->login, ['class' => 'form-control' . ($errors->has('login') ? ' is-invalid' : ''), 'placeholder' => 'Login']) }}
            {!! $errors->first('login', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $user->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surname') }}
            {{ Form::text('surname', $user->surname, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : ''), 'placeholder' => 'Surname']) }}
            {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
{{--            {{ Form::label('school_id') }}--}}
{{--            {{ Form::text('school_id', $user->school_id, ['class' => 'form-control' . ($errors->has('school_id') ? ' is-invalid' : ''), 'placeholder' => 'School Id']) }}--}}
{{--            {!! $errors->first('school_id', '<div class="invalid-feedback">:message</div>') !!}--}}

            <label for="tariff_id">Выберите школу</label>
            <select name="school_id" class="form-control" name="school_id">
                @foreach($schools as $school)
                    <option value="{{$school->id}}">{{\App\Models\Translate::whereId($school->name)->value('ru')}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
