@extends('layouts.app-form')

@section('template_title')
    Update feedback
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Обновление обратной связи</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('feedback.update', $feedback->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.feedback.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
