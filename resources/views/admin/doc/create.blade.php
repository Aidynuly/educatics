@extends('layouts.app-form')

@section('template_title')
    Create video
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Создание документа для сабкурса</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('docs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="course_intro_id" id="course_intro_id" value="{{$intro['id']}}">
                            @include('admin.doc.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
