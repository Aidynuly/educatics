@extends('layouts.app-form')

@section('template_title')
    Create School
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create School</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('schools.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.school.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
