@extends('layouts.app-form')

@section('template_title')
    Create Promocode
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Создать новый промокод</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promocodes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.promocode.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
