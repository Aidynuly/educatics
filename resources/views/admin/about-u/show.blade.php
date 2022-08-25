@extends('layouts.app-form')

@section('template_title')
    {{ $aboutU->name ?? 'Show About U' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show About U</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('about-us.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $aboutU->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
