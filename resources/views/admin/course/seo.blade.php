@extends('layouts.app-form')

@section('template_title')
    Update SEO Course
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Обновление SEO для курса - {{\App\Models\Translate::whereId($course->title)->value('ru')}}</span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('course-seo-update')}}" method="post" role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}">
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
                                                        {{isset($course->meta_title) ? \App\Models\Translate::where('id', $course->meta_title)->value('ru') : ''}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kazakh">
                                                <div class="form-group" id="kz">
                                                    <label for="ru">KZ</label>
                                                    <textarea type="text" class="form-control" id="ru" name="title_kz" placeholder="Введите название:">
                                                        {{isset($course->meta_title) ? \App\Models\Translate::where('id', $course->meta_title)->value('kz') : ''}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="english">
                                                <div class="form-group" id="en">
                                                    <label for="ru">EN</label>
                                                    <textarea type="text" class="form-control" id="ru" name="title_en" placeholder="Введите название:">
                                                        {{isset($course->meta_title) ? \App\Models\Translate::where('id', $course->meta_title)->value('en') : ''}}
                                                    </textarea>
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
                                                        {{isset($course->meta_description) ? \App\Models\Translate::where('id', $course->meta_description)->value('ru') : ''}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="english_desc">
                                                <div class="form-group">
                                                    <label for="ru">EN</label>
                                                    <textarea type="text" class=" form-control" id="ru" name="description_en" placeholder="Введите название:">
                                                        {{isset($course->meta_description) ? \App\Models\Translate::where('id', $course->meta_description)->value('en') : ''}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="kazakh_desc">
                                                <div class="form-group">
                                                    <label for="kz">KZ</label>
                                                    <textarea type="text" class="form-control" id="kz" name="description_kz" placeholder="Введите название:">
                                                        {{isset($course->meta_description) ? \App\Models\Translate::where('id', $course->meta_description)->value('kz') : ''}}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Принять</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
