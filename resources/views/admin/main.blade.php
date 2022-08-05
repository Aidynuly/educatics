@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Аналитика за месяц</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Транзакции: {{$firstDay}} : {{ $lastDay }}</strong>
                            </p>

                            <div class="chart">
                                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Количество:</strong>
                            </p>

                            <div class="progress-group">
                                Успешные
                                <span class="float-right"><b>{{count($successTransactions)}}</b>/{{count($transactions)}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 80%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                В процессе
                                <span class="float-right"><b>{{count($processTransactions)}}</b>/{{count($transactions)}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                <span class="progress-text">Отказ</span>
                                <span class="float-right"><b>{{count($rejectTransactions)}}</b>/{{count($transactions)}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
{{--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>--}}
                                <h5 class="description-header">${{$successSum}}</h5>
                                <span class="description-text">Сумма прибыли</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
{{--                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>--}}
                                <h5 class="description-header">${{$rejectSum}}</h5>
                                <span class="description-text">Сумма отказа</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
{{--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>--}}
                                <h5 class="description-header">${{$processSum}}</h5>
                                <span class="description-text">Сумма в процессе</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
