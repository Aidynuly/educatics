<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Тип') }}
{{--            {{ Form::text('type', $user->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}--}}
{{--            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}--}}
            {{ Form::select('type', ['parent' => 'Родитель', 'children' => 'Ребенок'], null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : '')]) }}
        </div>
        <div class="form-group">
{{--            {{ Form::label('Тариф') }}--}}
{{--            {{ Form::text('tariff_id', $user->tariff_id, ['class' => 'form-control' . ($errors->has('tariff_id') ? ' is-invalid' : ''), 'placeholder' => 'Tariff Id']) }}--}}
{{--            {!! $errors->first('tariff_id', '<div class="invalid-feedback">:message</div>') !!}--}}
            <label for="tariff_id">Тариф </label>
            <select name="tariff_id" class="form-control" id="tariff_id">
                @foreach($tariffs as $tariff)
                    <option value="{{$tariff->id}}">{{\App\Models\Translate::whereId($tariff->title)->value('ru')}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Возраст') }}
            {{ Form::text('age', $user->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''), 'placeholder' => 'Age']) }}
            {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Логин') }}
            {{ Form::text('login', $user->login, ['class' => 'form-control' . ($errors->has('login') ? ' is-invalid' : ''), 'placeholder' => 'Login']) }}
            {!! $errors->first('login', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Номер') }}
            {{ Form::text('phone', $user->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Имя') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Фамилия') }}
            {{ Form::text('surname', $user->surname, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : ''), 'placeholder' => 'Surname']) }}
            {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Название школы:') }}
            {{ Form::text('school_name', $user->school_name, ['class' => 'form-control' . ($errors->has('school_name') ? ' is-invalid' : ''), 'placeholder' => 'Название школы:']) }}
            {!! $errors->first('school_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="city_id">Выберите город:</label>
            <select name="city_id" class="form-control" id="city_id">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{\App\Models\Translate::whereId($city->title)->value('ru')}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>
