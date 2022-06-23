@extends('layouts.app')

@section('template_title')
    Feedback
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Обратная связь') }}
                            </span>

{{--                            <div class="float-right">--}}
{{--                                <a href="{{ route('feedback.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                    {{ __('Создать новый') }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>#</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Номер</th>
                                    <th>Логин</th>
                                    <th>Возраст</th>
                                    <th>Город</th>
                                    <th>Школа</th>
                                    <th>Статус</th>
                                    <th>Дата отправки</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $feedback->id }}</td>
                                        <td>{{ $feedback->name }}</td>
                                        <td>{{ $feedback->surname }}</td>
                                        <td>{{ $feedback->phone }}</td>
                                        <td>{{ $feedback->login }}</td>
                                        <td>{{ $feedback->age }}</td>
                                        <td>{{ \App\Models\City::whereId($feedback->city_id)->value('title') }}</td>
                                        <td>{{ $feedback->school_name }}</td>
                                        <td>{{ $feedback->status }}</td>
                                        <td>{{ $feedback->created_at }}</td>
                                        <td>
                                            <form action="{{ route('feedback.destroy',$feedback->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('feedback.edit',$feedback->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
