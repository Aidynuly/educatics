<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="type">Выберите тип:</label>
            <select id="type" name="type" class="form-control">
                <option value="mail">Мейл</option>
                <option value="phone">Номер</option>
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $contact->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="icon">Выберите картинку:</label>
            <input type="file" name="icon" id="icon" class="form-control">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>
