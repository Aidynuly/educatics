@extends('layouts.app')

@section('template_title')
    {{ $school->name ?? 'Show School' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show School</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('schools.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $school->name }}
                        </div>
                        <div class="form-group">
                            <strong>City Id:</strong>
                            {{ $school->city_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
