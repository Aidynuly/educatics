@extends('layouts.app-form')

@section('template_title')
    Footer create
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create footer</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('footer.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.footer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
