<div class="box box-info padding-1">
    <div class="box-body">

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
                            <textarea type="text" class="form-control" id="ru" name="title_ru" placeholder="Введите название:">
                                {{isset($course->title) ? \App\Models\Translate::where('id', $course->title)->value('ru') : ''}}
                            </textarea>
                            @if($errors->has('ru'))
                                <span class="text-danger">{{$errors->first('title_ru')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="kazakh">
                        <div class="form-group" id="kz">
                            <label for="ru">KZ</label>
                            <textarea type="text" class="form-control" id="ru" name="title_kz" placeholder="Введите название:">
                                 {{isset($course->title) ? \App\Models\Translate::where('id', $course->title)->value('kz') : ''}}
                            </textarea>
                            @if($errors->has('ru'))
                                <span class="text-danger">{{$errors->first('title_kz')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english">
                        <div class="form-group" id="en">
                            <label for="ru">EN</label>
                            <textarea type="text" class="form-control" id="ru" name="title_en" placeholder="Введите название:">
                                 {{isset($course->title) ? \App\Models\Translate::where('id', $course->title)->value('en') : ''}}
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
                    <li class="nav-item"><a class="nav-link active" href="#russian_desc" data-toggle="tab">Russian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#english_desc" data-toggle="tab">English</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kazakh_desc" data-toggle="tab">Kazakh</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="russian_desc">
                        <div class="form-group">
                            <label for="ru">RU</label>
                            <textarea type="text" class="ckeditor form-control" id="ru" name="description_ru" placeholder="Введите название:">
                                 {{isset($course->description) ? \App\Models\Translate::where('id', $course->description)->value('ru') : ''}}
                            </textarea>
                            {{--                            <textarea type="text" class="ckeditor form-control" id="ru" name="description_ru" placeholder="Введите название:"></textarea>--}}
                            @if($errors->has('ru'))
                                <span class="text-danger">{{$errors->first('description_ru')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english_desc">
                        <div class="form-group">
                            <label for="ru">EN</label>
                            <textarea type="text" class="ckeditor form-control" id="ru" name="description_en" placeholder="Введите название:">
                                {{isset($course->description) ? \App\Models\Translate::where('id', $course->description)->value('en') : ''}}
                            </textarea>
                            {{--                            <textarea type="text" class="ckeditor form-control" id="ru" name="description_en" placeholder="Введите название:"></textarea>--}}
                            @if($errors->has('ru'))
                                <span class="text-danger">{{$errors->first('description_en')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="kazakh_desc">
                        <div class="form-group">
                            <label for="kz">KZ</label>
                            {{--                            <textarea type="text" class="ckeditor form-control" id="kz" name="description_kz" placeholder="Введите название:"></textarea>--}}
                            <textarea type="text" class="ckeditor form-control" id="kz" name="description_kz" placeholder="Введите название:">
                                {{isset($course->description) ? \App\Models\Translate::where('id', $course->description)->value('kz') : ''}}
                            </textarea>
                            @if($errors->has('ru'))
                                <span class="text-danger">{{$errors->first('description_kz')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="image">Загрузите картинку:</label>
            <input type="file" class="form-control" name="image" id="image" required>
        </div>
        <div class="form-group">
            <label for="date">Дата:</label>
            <input type="datetime-local" id="date" name="date" class="form-control">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>
