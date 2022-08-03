@extends('layouts.app-form')

@section('template_title')
    Course intros
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Категории курсов') }}
                            </span>

                            <div class="float-right">
                                <form action="{{route('course-intros.create')}}" method="post">
                                    @method('get')
                                    <input type="hidden" name="course_id" value="{{$course['id']}}">
                                    <button class="btn btn-primary" type="submit">Создать новый</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Курс</th>
                                    <th>Название категории</th>
                                    <th>Тип</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($intros as $intro)
                                    <tr>
                                        <td>{{ $intro->id }}</td>
                                        <td>{{ App\Models\Translate::whereId(\App\Models\Course::whereId($intro->course_id)->value('title'))->value('ru') }}</td>
                                        <td>{{ App\Models\Translate::whereId($intro->title)->value('ru') }}
                                        <td>
                                            @if($intro->type == 'course')
                                                Курсовый
                                            @else
                                                Финальный
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('course-intros.destroy', $intro->id)}}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{route('video.show', $intro->id)}}">Видео</a>
                                                <a class="btn btn-sm btn-primary " href="{{route('docs.show', $intro->id)}}">Документы</a>
                                                <a class="btn btn-sm btn-primary " href="{{route('test.show', $intro->id)}}">Тесты</a>
                                                <a class="btn btn-sm btn-success" href="{{route('course-intros.edit', $intro->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
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
@endsection
