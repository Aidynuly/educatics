@extends('layouts.app-form')

@section('template_title')
    Update main page
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update main page</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('main-page.update', $mainPage->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.main-page.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
