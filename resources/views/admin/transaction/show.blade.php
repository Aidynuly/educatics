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
                            <span class="card-title">Данные транзакции</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Назад</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Пользователь:</strong>
                            {{ \App\Models\User::whereId($transaction->user_id)->value('name') }}
                            {{ \App\Models\User::whereId($transaction->user_id)->value('surname') }}
                        </div>
                        <div class="form-group">
                            <strong>Сумма оплаты:</strong>
                            {{ $transaction->price }}
                        </div>
                        <div class="form-group">
                            <strong>Статус:</strong>
                            @if($transaction->status == \App\Models\Transaction::STATUS_IN_PROCESS)
                                В процессе
                            @elseif($transaction->status == \App\Models\Transaction::STATUS_SUCCESS)
                                Успешно
                            @else
                                Отказ
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Интервал на сколько дней:</strong>
                            {{ $transaction->interval }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
