@extends('layouts.app-form')

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
                            <span class="card-title">Данные промокода - {{$promocode->title}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('promocodes.index') }}"> Назад</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Пользовались:</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Пользователь</th>
                                        <th>Статус</th>
                                        <th style="width: 40px">Добавлено:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($userPromocodes as $userPromocode)
                                            <td>{{$userPromocode->id}}</td>
                                            <td>{{\App\Models\User::whereId($userPromocode->user_id)->value('name')}} {{\App\Models\User::whereId($userPromocode->user_id)->value('surname')}}</td>
                                            <td>
                                                @if($userPromocode->status == 'in_process')
                                                    В процессе
                                                @elseif($userPromocode->status == 'success')
                                                    Успешно
                                                @else
                                                    Отменен
                                                @endif
                                            </td>
                                            <td><span class="badge bg-danger">{{$userPromocode->created_at}}</span></td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{$userPromocodes->links()}}
                                </ul>
{{--                                <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
