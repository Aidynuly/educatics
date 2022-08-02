@extends('layouts.app-form')

@section('template_title')
Редактировать историю
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Редактировать историю</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('stories.update', $story->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('admin.story.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection