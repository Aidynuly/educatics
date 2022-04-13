@extends('layouts.app-form')

@section('template_title')
    Create test
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Course</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('test.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <label>Название</label>
                                    <div class="card-body">
                                        <div class="form-group">
                                            {{ Form::label('Русский') }}
                                            {{ Form::text('ru', App\Models\Translate::whereId($test->title)->value('en'), ['class' => 'form-control' . ($errors->has('ru') ? ' is-invalid' : ''), 'placeholder' => 'Русский']) }}
                                            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Английский') }}
                                            {{ Form::text('en', App\Models\Translate::whereId($test->title)->value('ru'), ['class' => 'form-control' . ($errors->has('en') ? ' is-invalid' : ''), 'placeholder' => 'Английский']) }}
                                            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('Казахский') }}
                                            {{ Form::text('kz', App\Models\Translate::whereId($test->title)->value('kz'), ['class' => 'form-control' . ($errors->has('kz') ? ' is-invalid' : ''), 'placeholder' => 'Казахский']) }}
                                            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="course_id">Выберите курс</label>
                                        <select class="form-control" id="course_id" name="course_id">
                                            @foreach($courses as $course)
                                                <option value="{{$course->id}}">{{\App\Models\Translate::whereId($course->title)->value('ru')}}</option>
                                            @endforeach
                                        </select>
                                    </div>

{{--                                    <div class="form-group">--}}
{{--                                        <label for="course_id">Выберите категорию</label>--}}
{{--                                        <select class="form-control" id="course_intro_id" name="course_intro_id">--}}
{{--                                            @foreach($courses as $course)--}}
{{--                                                <option value="{{$course->id}}">{{\App\Models\Translate::whereId($course->title)->value('ru')}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
