<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="image">Загрузите фотографию:</label>
            <input type="file" name="image" id="image" placeholder="Загрузите фотографию" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label>Имя</label>
            <div class="card-body">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#russian_name" data-toggle="tab">Russian</a></li>
                        <li class="nav-item"><a class="nav-link" href="#english_name" data-toggle="tab">English</a></li>
                        <li class="nav-item"><a class="nav-link" href="#kazakh_name" data-toggle="tab">Kazakh</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="russian_name">
                            <div class="form-group">
                                <label for="russian_name">RU</label>
                                <textarea type="text" class="form-control" id="russian_name" name="name_ru" placeholder="Введите название:">
                                    {{isset($employee->name) ? \App\Models\Translate::where('id', $employee->name)->value('ru') : ''}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="kazakh_name">
                            <div class="form-group" id="kazakh_name">
                                <label for="kazakh_name">KZ</label>
                                <textarea type="text" class="form-control" id="kazakh_name" name="name_kz" placeholder="Введите название:">
                                    {{isset($employee->name) ? \App\Models\Translate::where('id', $employee->name)->value('kz') : ''}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="english_name">
                            <div class="form-group" id="english_name">
                                <label for="english_name">EN</label>
                                <textarea type="text" class="form-control" id="english_name" name="name_en" placeholder="Введите название:">
                                    {{isset($employee->name) ? \App\Models\Translate::where('id', $employee->name)->value('en') : ''}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Фамилия</label>
            <div class="card-body">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#russian_surname" data-toggle="tab">Russian</a></li>
                        <li class="nav-item"><a class="nav-link" href="#english_surname" data-toggle="tab">English</a></li>
                        <li class="nav-item"><a class="nav-link" href="#kazakh_surname" data-toggle="tab">Kazakh</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="russian_surname">
                            <div class="form-group">
                                <label for="russian_surname">RU</label>
                                <textarea type="text" class="form-control" id="russian_surname" name="surname_ru" placeholder="Введите название:">
                                    {{isset($employee->surname) ? \App\Models\Translate::where('id', $employee->surname)->value('ru') : ''}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="kazakh_surname">
                            <div class="form-group" id="kazakh_surname">
                                <label for="kazakh_surname">KZ</label>
                                <textarea type="text" class="form-control" id="kazakh_surname" name="surname_kz" placeholder="Введите название:">
                                    {{isset($employee->surname) ? \App\Models\Translate::where('id', $employee->surname)->value('kz') : ''}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="english_surname">
                            <div class="form-group" id="english_surname">
                                <label for="english_surname">EN</label>
                                <textarea type="text" class="form-control" id="english_surname" name="surname_en" placeholder="Введите название:">
                                    {{isset($employee->surname) ? \App\Models\Translate::where('id', $employee->surname)->value('en') : ''}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Позиция</label>
            <div class="card-body">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#russian_position" data-toggle="tab">Russian</a></li>
                        <li class="nav-item"><a class="nav-link" href="#english_position" data-toggle="tab">English</a></li>
                        <li class="nav-item"><a class="nav-link" href="#kazakh_position" data-toggle="tab">Kazakh</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="russian_position">
                            <div class="form-group">
                                <label for="russian_position">RU</label>
                                <textarea type="text" class="form-control" id="russian_position" name="position_ru" placeholder="Введите название:">
                                    {{isset($employee->position) ? \App\Models\Translate::where('id', $employee->position)->value('ru') : ''}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="kazakh_position">
                            <div class="form-group" id="kazakh_position">
                                <label for="kazakh_position">KZ</label>
                                <textarea type="text" class="form-control" id="kazakh_position" name="position_kz" placeholder="Введите название:">
                                    {{isset($employee->position) ? \App\Models\Translate::where('id', $employee->position)->value('kz') : ''}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="english_position">
                            <div class="form-group" id="english_position">
                                <label for="english_position">EN</label>
                                <textarea type="text" class="form-control" id="english_position" name="position_en" placeholder="Введите название:">
                                    {{isset($employee->position) ? \App\Models\Translate::where('id', $employee->position)->value('en') : ''}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>
