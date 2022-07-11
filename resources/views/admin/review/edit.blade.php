@extends('layouts.app-form')

@section('template_title')
    Update Review
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Обновить отзыв</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reviews.update', $review->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.review.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
