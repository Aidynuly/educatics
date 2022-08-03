@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Создать новый') }}
                                </a>
                              </div>
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
                                        <th>Картинка</th>
										<th>Тип</th>
                                        <th>Имя</th>
                                        <th>Фамилия</th>
										<th>Тариф</th>
										<th>Возраст</th>
										<th>Логин</th>
										<th>Номер</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <img src="{{url("$user->image")}}" class="img-circle elevation-2" width="150px" height="100px">
                                            </td>
                                            @if($user->type == 'parent')
											    <td>Взрослый</td>
                                            @else
                                                <td>Детский</td>
                                            @endif
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->surname }}</td>
											<td>{{ \App\Models\Translate::whereId(\App\Models\Tariff::whereId($user->tariff_id)->value('title'))->value('ru') }}</td>
											<td>{{ $user->age }}</td>
											<td>{{ $user->login }}</td>
											<td>{{ $user->phone }}</td>

                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
