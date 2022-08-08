<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
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
                                {{--                            <textarea type="text" class="ckeditor form-control" id="ru" name="title_ru" placeholder="Введите название:"></textarea>--}}
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
                                {{--                            <textarea type="text" class="ckeditor form-control" id="ru" name="title_kz" placeholder="Введите название:"></textarea>--}}
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
                                {{--                            <textarea type="text" class="ckeditor form-control" id="ru" name="title_en" placeholder="Введите название:"></textarea>--}}
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
        </div>
        <div class="form-group">
            <label for="doc">Загрузите файл:</label>
            <input type="file" name="doc" class="form-control" id="doc">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>
