@extends('layouts.app-form')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <br>
    <section class="content container-fluid">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{url("$user->image")}}" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{$user->name}} {{$user->surname}}</h3>
                                <p class="text-muted text-center">
                                    @if($user->type == 'parent')
                                        Родитель
                                    @else
                                        Ученик
                                    @endif
                                </p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Логин</b> <a class="float-right">{{$user->login}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Возраст</b> <a class="float-right">{{$user->age}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Номер</b> <a class="float-right">{{$user->phone}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Название школы:</b> <a class="float-right">{{$user->school_name}}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Тариф</h3>
                            </div>

                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Тип тарифа</strong>
                                @if($user->tariff_id)
                                    <p class="text-muted">{{ \App\Models\Translate::whereId(\App\Models\Tariff::whereId($user->tariff_id)->value('title'))->value('ru')}}</p>
                                @else
                                    <p class="text-muted">Тарифа нет</p>
                                @endif
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Город</strong>
                                @if($user->city_id)
                                    <p class="text-muted">{{\App\Models\Translate::whereId(\App\Models\City::whereId($user->city_id)->value('title'))->value('ru')}}</p>
                                @else
                                    <p class="text-muted">Города нет</p>
                                @endif
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Дедлайн</strong>
                                @if($user->deadline)
                                    <p class="text-muted">{{$user->deadline}}</p>
                                @else
                                    <p class="text-muted">Тарифа нет</p>
                                @endif

                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#activity" data-toggle="tab">Транзакции</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#timeline" data-toggle="tab">Курсы</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#settings" data-toggle="tab">Корзина</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        <div class="post">
                                            @foreach($transactions as $transaction)
                                                <div class="user-block">
                                                    <span class="username">
                                                        <a href="#">{{\App\Models\User::whereId($transaction->user_id)->value('name')}} {{\App\Models\User::whereId($transaction->user_id)->value('surname')}}</a>
                                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i>Дата транзакции:</a>
                                                    </span>
                                                    <span class="description">{{$transaction->created_at}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Статус:</label>
                                                    @if($transaction->status == 'in_process')
                                                        <p id="status">В процессе</p>
                                                    @elseif($transaction->status == 'success')
                                                        <p id="status">Успешно</p>
                                                    @else
                                                        <p id="status">Отменен</p>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Цена:</label>
                                                    <p>{{$transaction->price}}</p>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="timeline">
                                        <div class="float-right">
                                            <a href="{{route('user-course-add', $user->id)}}" class="btn btn-sm btn-info">Добавить курс</a>
                                        </div>
                                        <br>
                                        <div class="post">
                                            <br>
                                            @foreach($courses as $course)
                                                <div class="user-block">
                                                    <span class="username">
                                                            <a href="#">{{\App\Models\User::whereId($course->user_id)->value('name')}} {{\App\Models\User::whereId($course->user_id)->value('surname')}}</a>
                                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i>Дата начала:</a>
                                                    </span>
                                                    <span class="description">{{$course->created_at}}</span>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="status">Название курса:</label>
                                                    <p>{{\App\Models\Translate::whereId(\App\Models\Course::whereId($course->course_id)->value('title'))->value('ru')}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Статус:</label>
                                                    @if($course->status == 'in_process')
                                                        <p id="status">В процессе</p>
                                                    @elseif($transaction->status == 'finished')
                                                        <p id="status">Успешно</p>
                                                    @else
                                                        <p id="status">Отменен</p>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <form action="{{ route('user-course-destroy') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                                        <input type="hidden" name="course_id" value="{{$course->course_id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Удалить курс</button>
                                                    </form>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="settings">
                                        <div class="post">
                                            @foreach($baskets as $basket)
                                                <div class="user-block">
                                                    <span class="username">
                                                            <a href="#">{{\App\Models\User::whereId($basket->user_id)->value('name')}} {{\App\Models\User::whereId($basket->user_id)->value('surname')}}</a>
                                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i>Дата добавление:</a>
                                                    </span>
                                                    <span class="description">{{$basket->created_at}}</span>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="status">Название курса:</label>
                                                    <p>{{\App\Models\Translate::whereId(\App\Models\Course::whereId($basket->course_id)->value('title'))->value('ru')}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Название тарифа:</label>
                                                    <p>{{\App\Models\Translate::whereId(\App\Models\Tariff::whereId($basket->tariff_id)->value('title'))->value('ru')}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Статус:</label>
                                                    @if($basket->status == 'in_process')
                                                        <p id="status">В процессе</p>
                                                    @elseif($transaction->status == 'success')
                                                        <p id="status">Успешно</p>
                                                    @else
                                                        <p id="status">Отменен</p>
                                                    @endif
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </section>
@endsection
