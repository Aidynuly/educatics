@extends('layouts.app')

@section('template_title')
    {{ $sphere->name ?? 'Show Sphere' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sphere</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('spheres.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $sphere->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $sphere->description }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $sphere->icon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
