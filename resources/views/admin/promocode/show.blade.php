@extends('layouts.app')

@section('template_title')
    {{ $promocode->name ?? 'Show Promocode' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Promocode</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('promocodes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $promocode->title }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $promocode->code }}
                        </div>
                        <div class="form-group">
                            <strong>Procent:</strong>
                            {{ $promocode->procent }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
