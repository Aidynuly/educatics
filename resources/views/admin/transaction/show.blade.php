@extends('layouts.app-form')

@section('template_title')
    {{ $transaction->name ?? 'Show Transaction' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Transaction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $transaction->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $transaction->price }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $transaction->status }}
                        </div>
                        <div class="form-group">
                            <strong>Interval:</strong>
                            {{ $transaction->interval }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
