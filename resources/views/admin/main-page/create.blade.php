@extends('layouts.app-form')

@section('template_title')
    Create main page
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Главная страница</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('main-page.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.main-page.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
