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
        <label>Текст скидки</label>
        <div class="card-body">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#discount_ru" data-toggle="tab">Russian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#discount_en" data-toggle="tab">English</a></li>
                    <li class="nav-item"><a class="nav-link" href="#discount_kz" data-toggle="tab">Kazakh</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="discount_ru">
                        <div class="form-group">
                            <label for="discount_ru">RU</label>
                            <textarea type="text" class="ckeditor form-control" id="discount_ru" name="discount_ru" placeholder="Введите название:">
                                {{isset($tariff->discount_text) ? \App\Models\Translate::where('id', $tariff->discount_text)->value('ru') : ''}}
                            </textarea>
                            @if($errors->has('discount_ru'))
                                <span class="text-danger">{{$errors->first('discount_ru')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="discount_kz">
                        <div class="form-group" id="discount_kz">
                            <label for="discount_kz">KZ</label>
                            <textarea type="text" class="ckeditor form-control" id="discount_kz" name="discount_kz" placeholder="Введите название:">
                                {{isset($tariff->discount_text) ? \App\Models\Translate::where('id', $tariff->discount_text)->value('kz') : ''}}
                            </textarea>
                            @if($errors->has('discount_kz'))
                                <span class="text-danger">{{$errors->first('discount_kz')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="discount_en">
                        <div class="form-group" id="discount_en">
                            <label for="discount_en">EN</label>
                            <textarea type="text" class="ckeditor form-control" id="discount_en" name="discount_en" placeholder="Введите название:">
                                {{isset($tariff->discount_text) ? \App\Models\Translate::where('id', $tariff->discount_text)->value('en') : ''}}
                            </textarea>

                            @if($errors->has('discount_en'))
                                <span class="text-danger">{{$errors->first('discount_en')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <label>Курс текст:</label>
        <div class="card-body">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#russian_course" data-toggle="tab">Russian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#english_course" data-toggle="tab">English</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kazakh_course" data-toggle="tab">Kazakh</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="russian_course">
                        <div class="form-group">
                            <label for="russian_course">RU</label>
                            <textarea type="text" class="ckeditor form-control" id="russian_course" name="course_text_ru" placeholder="Введите название:">
                                {{isset($tariff->course_text) ? \App\Models\Translate::where('id', $tariff->course_text)->value('ru') : ''}}
                            </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="kazakh_course">
                        <div class="form-group" id="kazakh_course">
                            <label for="kazakh_course">KZ</label>
                            <textarea type="text" class="ckeditor form-control" id="kazakh_course" name="course_text_kz" placeholder="Введите название:">
                                 {{isset($tariff->course_text) ? \App\Models\Translate::where('id', $tariff->course_text)->value('kz') : ''}}
                            </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="english_course">
                        <div class="form-group" id="english_course">
                            <label for="english_course">EN</label>
                            <textarea type="text" class="ckeditor form-control" id="english_course" name="course_text_en" placeholder="Введите название:">
                                 {{isset($tariff->course_text) ? \App\Models\Translate::where('id', $tariff->course_text)->value('en') : ''}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            {{ Form::label('Цена') }}
            {{ Form::text('price', $tariff->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="count">Количество курсов:</label>
            <input type="text" class="form-control" name="count" id="count" value="{{$tariff->count}}">
        </div>
        <div class="form-group">
            <label for="old_price">Старая цена:</label>
            <input type="text" class="form-control" name="old_price" id="old_price" value="{{$tariff->old_price}}">
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
