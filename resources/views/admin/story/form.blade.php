<div class="box box-info padding-1">
    <div class="box-body">
        <label>Заголовок</label>
        <div class="card-body">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#russian" data-toggle="tab">Russian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#english" data-toggle="tab">English</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kazakh" data-toggle="tab">Kazakh</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="russian">
                        <div class="form-group">
                            <label for="ru">RU</label>
                            <input class="form-control" type="text" name="title_ru"
                                value="{{isset($story->title) ? \App\Models\Translate::where('id', $story->title)->value('ru') : ''}}">
                            @if($errors->has('ru'))
                            <span class="text-danger">{{$errors->first('title_ru')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="kazakh">
                        <div class="form-group" id="kz">
                            <label for="ru">KZ</label>
                            <input class="form-control" type="text" name="title_kz"
                                value="{{isset($story->title) ? \App\Models\Translate::where('id', $story->title)->value('kz') : ''}}">
                            @if($errors->has('kz'))
                            <span class="text-danger">{{$errors->first('title_kz')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english">
                        <div class="form-group" id="en">
                            <label for="ru">EN</label>
                            <input class="form-control" type="text" name="title_en"
                                value="{{isset($story->title) ? \App\Models\Translate::where('id', $story->title)->value('en') : ''}}">
                            @if($errors->has('en'))
                            <span class="text-danger">{{$errors->first('title_en')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="box-body">
        <label>Описание</label>
        <div class="card-body">
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#russian_desc" data-toggle="tab">Russian</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#english_desc" data-toggle="tab">English</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kazakh_desc" data-toggle="tab">Kazakh</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="russian_desc">
                        <div class="form-group">
                            <label for="ru">RU</label>
                            <textarea type="text" class="form-control" id="ru" name="description_ru"
                                placeholder="Введите описание:">{{isset($story->description) ? \App\Models\Translate::where('id', $story->description)->value('ru') : ''}}</textarea>
                            @if($errors->has('ru'))
                            <span class="text-danger">{{$errors->first('description_ru')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english_desc">
                        <div class="form-group">
                            <label for="ru">EN</label>
                            <textarea type="text" class="form-control" id="ru" name="description_en"
                                placeholder="Введите описание:">{{isset($story->description) ? \App\Models\Translate::where('id', $story->description)->value('en') : ''}}</textarea>
                            @if($errors->has('ru'))
                            <span class="text-danger">{{$errors->first('description_en')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="kazakh_desc">
                        <div class="form-group">
                            <label for="kz">KZ</label>
                            <textarea type="text" class="form-control" id="kz" name="description_kz"
                                placeholder="Введите описание:">{{isset($story->description) ? \App\Models\Translate::where('id', $story->description)->value('kz') : ''}}</textarea>
                            @if($errors->has('ru'))
                            <span class="text-danger">{{$errors->first('description_kz')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <label for="icon">Загрузите иконку:</label>
        <input type="file" class="form-control" name="image" id="icon">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>