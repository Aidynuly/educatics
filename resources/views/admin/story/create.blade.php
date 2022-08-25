@extends('layouts.app-form')

@section('template_title')
Добавить историю
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Добавить историю</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('stories.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('admin.story.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection