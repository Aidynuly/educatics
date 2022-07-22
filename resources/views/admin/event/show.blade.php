@extends('layouts.app-form')

@section('template_title')
    {{ $event->name ?? 'Show Event' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Event</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $event->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $event->description }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $event->image }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $event->date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
