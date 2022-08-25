@extends('layouts.app-form')

@section('template_title')
    Create course introduction
@endsection

@section('content')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">Создание категории</span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('course-intros.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="course_id" id="course_id" value="{{$course['id']}}">
                                @include('admin.course-intro.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
