@extends('layouts.app-form')

@section('template_title')
    Обновить вопрос
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Обновить вопрос</span>
                        <form method="get" action="{{route('test.index')}}">
                            <input type="hidden" name="test_id" id="test_id" value="{{$question->test_id}}">
                            <button class="btn btn-success btn-sm float-right" type="submit">Назад</button>
                        </form>
                        <div class="float-right">
                            <form method="get" action="{{route('question-answer.create')}}">
                                <input type="hidden" name="id" value="{{$question->id}}">

                                <button class="btn btn-primary btn-sm float-right" type="submit">Create answer</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('questions.update', $question->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <label>Название вопроса</label>
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
                                                        <input type="text" class="form-control" id="ru" name="title_ru" value="{{\App\Models\Translate::whereId($question->title)->value('ru')}}">
                                                        @if($errors->has('ru'))
                                                            <span class="text-danger">{{$errors->first('title_ru')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kazakh">
                                                    <div class="form-group" id="kz">
                                                        <label for="ru">KZ</label>
                                                        <input type="text" class="form-control" id="ru" name="title_kz" value="{{\App\Models\Translate::whereId($question->title)->value('kz')}}">
                                                        @if($errors->has('ru'))
                                                            <span class="text-danger">{{$errors->first('title_kz')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="english">
                                                    <div class="form-group" id="en">
                                                        <label for="ru">EN</label>
                                                        <input type="text" class="form-control" id="ru" name="title_en" value="{{\App\Models\Translate::whereId($question->title)->value('en')}}">
                                                        @if($errors->has('ru'))
                                                            <span class="text-danger">{{$errors->first('title_en')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer mt20">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            <div>
                                <div>
                                    <label>Ответы</label>
                                    <div class="card-body">
                                        <div class="card-header">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#russian_answer" data-toggle="tab">Russian</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#english_answer" data-toggle="tab">English</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#kazakh_answer" data-toggle="tab">Kazakh</a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="russian_answer">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Описание</th>
                                                            <th>Правильный ответ</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($answers as $answer)
                                                            <tr>
                                                                <td>{{$answer->id}}</td>
                                                                <td>{{\App\Models\Translate::whereId($answer->title)->value('ru')}}</td>
                                                                @if($answer->is_correct == true)
                                                                    <td>Да</td>
                                                                @else
                                                                    <td>Нет</td>
                                                                @endif

                                                                <td>
                                                                    <form action="{{route('question-answer.destroy', $answer->id)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a class="btn btn-sm btn-success" href="{{ route('question-answer.edit',$answer->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="english_answer">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Описание</th>
                                                            <th>Правильный ответ</th>
                                                            <th>Сфера</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($answers as $answer)
                                                            <tr>
                                                                <td>{{$answer->id}}</td>
                                                                <td>{{\App\Models\Translate::whereId($answer->title)->value('en')}}</td>
                                                                @if($answer->is_correct == true)
                                                                    <td>Да</td>
                                                                @else
                                                                    <td>Нет</td>
                                                                @endif
                                                                <td>
                                                                    {{\App\Models\Translate::whereId(App\Models\Sphere::where('id', $answer->sphere_id)->value('title'))->value('ru')}}
                                                                </td>
                                                                <td>
                                                                    <form action="{{route('question-answer.destroy', $answer->id)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a class="btn btn-sm btn-success" href="{{ route('question-answer.edit',$answer->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="kazakh_answer">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Описание</th>
                                                            <th>Правильный ответ</th>
                                                            <th>Сфера</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($answers as $answer)
                                                            <tr>
                                                                <td>{{$answer->id}}</td>
                                                                <td>{{\App\Models\Translate::whereId($answer->title)->value('kz')}}</td>
                                                                @if($answer->is_correct == true)
                                                                    <td>Да</td>
                                                                @else
                                                                    <td>Нет</td>
                                                                @endif
                                                                <td>
                                                                    {{\App\Models\Translate::whereId(App\Models\Sphere::where('id', $answer->sphere_id)->value('title'))->value('ru')}}
                                                                </td>
                                                                <td>
                                                                    <form action="{{route('question-answer.destroy', $answer->id)}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <a class="btn btn-sm btn-success" href="{{ route('question-answer.edit',$answer->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                        </form>--}}
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
