<div class="box box-info padding-1">
    <div class="box-body">

        <label>Название</label>
        <div class="card-body">
            <div class="form-group">
                {{ Form::label('Русский') }}
                {{ Form::text('title_ru', App\Models\Translate::whereId($tariff->title)->value('ru'), ['class' => 'form-control' . ($errors->has('ru') ? ' is-invalid' : ''), 'placeholder' => 'Русский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Английский') }}
                {{ Form::text('title_en', App\Models\Translate::whereId($tariff->title)->value('en'), ['class' => 'form-control' . ($errors->has('en') ? ' is-invalid' : ''), 'placeholder' => 'Английский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Казахский') }}
                {{ Form::text('title_kz', App\Models\Translate::whereId($tariff->title)->value('kz'), ['class' => 'form-control' . ($errors->has('kz') ? ' is-invalid' : ''), 'placeholder' => 'Казахский']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>')!!}
            </div>
        </div>
        <label>Описание</label>
        <div class="card-body">
            <div class="form-group">
                <label for="description_ru">Русский</label>
                <textarea type="text" class="ckeditor form-control" id="description_ru" name="description_ru" placeholder="Введите название:">
                    {{isset($tariff->description) ? \App\Models\Translate::where('id', $tariff->description)->value('ru') : ''}}
                </textarea>
                @if($errors->has('ru'))
                    <span class="text-danger">{{$errors->first('description_ru')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description_en">Английский</label>
                <textarea type="text" class="ckeditor form-control" id="description_en" name="description_en" placeholder="Введите название:">
                    {{isset($tariff->description) ? \App\Models\Translate::where('id', $tariff->description)->value('en') : ''}}
                </textarea>
                @if($errors->has('en'))
                    <span class="text-danger">{{$errors->first('description_en')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="description_kz">Казахский</label>
                <textarea type="text" class="ckeditor form-control" id="description_kz" name="description_kz" placeholder="Введите название:">
                    {{isset($tariff->description) ? \App\Models\Translate::where('id', $tariff->description)->value('kz') : ''}}
                </textarea>
                @if($errors->has('kz'))
                    <span class="text-danger">{{$errors->first('description_kz')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $tariff->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="count">Количество курсов:</label>
            <input type="text" class="form-control" name="count" id="count" value="{{$tariff->count}}">
        </div>
        <div class="form-group">
            <label for="discount">Скидка:</label>
            <input type="text" class="form-control" name="discount" id="discount" value="{{$tariff->discount}}">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
