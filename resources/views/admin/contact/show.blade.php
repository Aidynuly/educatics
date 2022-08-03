@extends('layouts.app-form')

@section('template_title')
    {{ $contact->name ?? 'Show Contact' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Contact</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $contact->type }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $contact->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Icon:</strong>
                            {{ $contact->icon }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
