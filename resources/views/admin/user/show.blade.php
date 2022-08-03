@extends('layouts.app-form')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $user->type }}
                        </div>
                        <div class="form-group">
                            <strong>Tariff Id:</strong>
                            {{ $user->tariff_id }}
                        </div>
                        <div class="form-group">
                            <strong>Age:</strong>
                            {{ $user->age }}
                        </div>
                        <div class="form-group">
                            <strong>Login:</strong>
                            {{ $user->login }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $user->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Surname:</strong>
                            {{ $user->surname }}
                        </div>
                        <div class="form-group">
                            <strong>School Id:</strong>
                            {{ $user->school_id }}
                        </div>
                        <div class="form-group">
                            <label for="image">Фото:</label><br>
                            <img src="{{url("$user->image")}}" id="image" class="img-circle elevation-2" width="150px" height="100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
