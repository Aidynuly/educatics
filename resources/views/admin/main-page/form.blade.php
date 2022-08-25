<div class="box box-info padding-1">
    <label>Название</label>
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
                        <textarea type="text" class="ckeditor form-control" id="ru" name="title_ru"
                            placeholder="Введите название:">
                             {{isset($mainPage->title) ? \App\Models\Translate::where('id', $mainPage->title)->value('ru') : ''}}
                        </textarea>
                        @if($errors->has('ru'))
                        <span class="text-danger">{{$errors->first('title_ru')}}</span>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="kazakh">
                    <div class="form-group" id="kz">
                        <label for="ru">KZ</label>
                        <textarea type="text" class="ckeditor form-control" id="ru" name="title_kz"
                            placeholder="Введите название:">
                            {{isset($mainPage->title) ? \App\Models\Translate::where('id', $mainPage->title)->value('kz') : ''}}
                        </textarea>
                        @if($errors->has('ru'))
                        <span class="text-danger">{{$errors->first('title_kz')}}</span>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="english">
                    <div class="form-group" id="en">
                        <label for="ru">EN</label>
                        <textarea type="text" class="ckeditor form-control" id="ru" name="title_en"
                            placeholder="Введите название:">
                            {{isset($mainPage->title) ? \App\Models\Translate::where('id', $mainPage->title)->value('en') : ''}}
                        </textarea>
                        @if($errors->has('ru'))
                        <span class="text-danger">{{$errors->first('title_en')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <label>Описание</label>
    <div class="card-body">
        <div class="card-header">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#russian_description"
                        data-toggle="tab">Russian</a></li>
                <li class="nav-item"><a class="nav-link" href="#english_description" data-toggle="tab">English</a></li>
                <li class="nav-item"><a class="nav-link" href="#kazakh_description" data-toggle="tab">Kazakh</a></li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="russian_description">
                    <div class="form-group">
                        <label for="ru">RU</label>
                        <textarea type="text" class="ckeditor form-control" id="ru" name="description_ru"
                            placeholder="Введите название:">
                            {{isset($mainPage->description) ? \App\Models\Translate::where('id', $mainPage->description)->value('ru') : ''}}
                        </textarea>
                        @if($errors->has('ru'))
                        <span class="text-danger">{{$errors->first('title_ru')}}</span>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="kazakh_description">
                    <div class="form-group" id="kz">
                        <label for="ru">KZ</label>
                        <textarea type="text" class="ckeditor form-control" id="ru" name="description_kz"
                            placeholder="Введите название:">
                            {{isset($mainPage->description) ? \App\Models\Translate::where('id', $mainPage->description)->value('kz') : ''}}
                        </textarea>
                        @if($errors->has('ru'))
                        <span class="text-danger">{{$errors->first('title_kz')}}</span>
                        @endif
                    </div>
                </div>
                <div class="tab-pane" id="english_description">
                    <div class="form-group" id="en">
                        <label for="ru">EN</label>
                        <textarea type="text" class="ckeditor form-control" id="ru" name="description_en"
                            placeholder="Введите название:">
                            {{isset($mainPage->description) ? \App\Models\Translate::where('id', $mainPage->description)->value('en') : ''}}
                        </textarea>
                        @if($errors->has('ru'))
                        <span class="text-danger">{{$errors->first('title_en')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="url">Ссылка на видео</label>
        <input type="text" class="form-control" id="url" name="video_url" placeholder="Введите ссылку:"
            value="{{isset($mainPage->video_url) ? $mainPage->video_url : ''}}">
    </div>

    <div class="form-group">
        <label for="block">Выберите блок:</label>
        <select class="form-control" name="block" id="block">
            <option value="1">1</option>
            <option value="2" @if ($mainPage->block == 2) selected @endif>2</option>
            <option value="3" @if ($mainPage->block == 3) selected @endif>3</option>
        </select>
    </div>
    <div class="form-group">
        <label for="icon">Загрузите иконку:</label>
        <input type="file" class="form-control" id="icon" name="icon">
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>