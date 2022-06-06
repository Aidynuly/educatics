@extends('layouts.app-form')

@section('template_title')
    {{ $tariff->name ?? 'Show Tariff' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tariff</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tariffs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Название:</strong>
                            <div class="form-group">
                                <strong>Русский:</strong>
                                {{ \App\Models\Translate::whereId($tariff->title)->value('ru') }}
                                <strong>Английский:</strong>
                                {{ \App\Models\Translate::whereId($tariff->title)->value('en') }}
                                <strong>Казахский:</strong>
                                {{ \App\Models\Translate::whereId($tariff->title)->value('kz') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $tariff->description }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $tariff->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
