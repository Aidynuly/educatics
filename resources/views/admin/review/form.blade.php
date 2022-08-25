<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="type">Выберите тип:</label>
            <select class="form-control" id="type" name="type">
                <option value="parent">Родители</option>
                <option value="children">Ученики</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{isset($review->name) ? $review->name : null}}">
        </div>
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
                                <textarea type="text" class="form-control" id="ru" name="title_ru" placeholder="Введите название:">
                                    {{isset($review->title) ? \App\Models\Translate::where('id', $review->title)->value('ru') : ''}}
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
                                    {{isset($review->title) ? \App\Models\Translate::where('id', $review->title)->value('kz') : ''}}
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
                                    {{isset($review->title) ? \App\Models\Translate::where('id', $review->title)->value('en') : ''}}
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
                                <textarea type="text" class=" form-control" id="ru" name="description_ru" placeholder="Введите название:">
                                    {{isset($review->description) ? \App\Models\Translate::where('id', $review->description)->value('ru') : ''}}
                                </textarea>
                                @if($errors->has('ru'))
                                    <span class="text-danger">{{$errors->first('description_ru')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="english_desc">
                            <div class="form-group">
                                <label for="ru">EN</label>
                                <textarea type="text" class=" form-control" id="ru" name="description_en" placeholder="Введите название:">
                                    {{isset($review->description) ? \App\Models\Translate::where('id', $review->description)->value('en') : ''}}
                                </textarea>
                                @if($errors->has('ru'))
                                    <span class="text-danger">{{$errors->first('description_en')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="kazakh_desc">
                            <div class="form-group">
                                <label for="kz">KZ</label>
                                <textarea type="text" class="form-control" id="kz" name="description_kz" placeholder="Введите название:">
                                    {{isset($review->description) ? \App\Models\Translate::where('id', $review->description)->value('kz') : ''}}
                                </textarea>
                                @if($errors->has('ru'))
                                    <span class="text-danger">{{$errors->first('description_kz')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Загрузите фотографию:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="school_name">Название школы:</label>
            <input type="text" class="form-control" id="school_name" name="school_name" value="{{isset($review->school_name) ? $review->school_name : null}}">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
