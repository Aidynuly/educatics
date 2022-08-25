@extends('layouts.app-form')

@section('template_title')
    Create answer
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create answer for the question</span>
                        <div class="float-right">
                            <form method="get" action="{{route('questions.edit', $question['id'])}}">
                                <button class="btn btn-success btn-sm float-right" type="submit">Назад</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('question-answer.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$question['id']}}" name="question_id">
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <label>Название ответа</label>
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
                                                        <input type="text" class="form-control" id="ru" name="title_ru" placeholder="Placeholder" required>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kazakh">
                                                    <div class="form-group" id="kz">
                                                        <label for="ru">KZ</label>
                                                        <input type="text" class="form-control" id="ru" name="title_kz" placeholder="Placeholder" required>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="english">
                                                    <div class="form-group" id="en">
                                                        <label for="ru">EN</label>
                                                        <input type="text" class="form-control" id="ru" name="title_en" placeholder="Placeholder" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label for="is_correct">Правильный ответ</label>
                                    <input type="checkbox" name="is_correct" id="is_correct">
                                </div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
