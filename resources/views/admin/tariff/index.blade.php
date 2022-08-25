@extends('layouts.app')

@section('template_title')
    Tariff
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Тарифы') }}
                            </span>

                             <div class="float-right">
{{--                                <a href="{{ route('tariffs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                  {{ __('Create New') }}--}}
{{--                                </a>--}}
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
										<th>Название</th>
										<th>Описание</th>
										<th>Цена</th>
										<th>Старая цена</th>
										<th>Количество курсов</th>
										<th>Скидка</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tariffs as $tariff)
                                        <tr>
                                            <td>{{ $tariff->id }}</td>
											<td>{{ \App\Models\Translate::whereId($tariff->title)->value('ru') }}</td>
											<td>{{ \App\Models\Translate::whereId($tariff->description)->value('ru') }}</td>
											<td>{{ $tariff->price }}</td>
											<td>{{ $tariff->old_price }}</td>
											<td>{{ $tariff->count }}</td>
											<td>{{ $tariff->discount }}%</td>

                                            <td>
                                                <form action="{{ route('tariffs.destroy',$tariff->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tariffs.show',$tariff->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tariffs.edit',$tariff->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
{{--                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>--}}
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
