@extends('layouts.app-form')

@section('template_title')
    Добавление курса
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Добавить курс</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-course-store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="user_id">
                            <div class="form-group">
                                <label for="course_id">Вы можете добавить эти курсы:</label>
                                <select class="form-control" name="course_id" id="course_id">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{\App\Models\Translate::whereId($course->title)->value('ru')}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-sm btn-info" type="submit">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
