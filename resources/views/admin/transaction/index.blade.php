@extends('layouts.app')

@section('template_title')
    Transaction
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Транзакции') }}
                            </span>

{{--                             <div class="float-right">--}}
{{--                                <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                  {{ __('Create New') }}--}}
{{--                                </a>--}}
{{--                              </div>--}}
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

										<th>Пользователь</th>
										<th>Цена</th>
										<th>Статус</th>
										<th>Интервал(количество дней)</th>
										<th>Дата</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>

											<td>{{ \App\Models\User::whereId($transaction->user_id)->value('name') }} {{ \App\Models\User::whereId($transaction->user_id)->value('surname')}}</td>
											<td>{{ $transaction->price }}</td>
											<td>
                                                @if($transaction->status == \App\Models\Transaction::STATUS_IN_PROCESS)
                                                    В процессе
                                                @elseif($transaction->status == \App\Models\Transaction::STATUS_SUCCESS)
                                                    Успешно
                                                @else
                                                    Отказ
                                                @endif
                                            </td>
											<td>{{ $transaction->interval }}</td>
											<td>{{ $transaction->created_at }}</td>

                                            <td>
                                                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('transactions.show',$transaction->id) }}"><i class="fa fa-fw fa-eye"></i></a>
{{--                                                    <a class="btn btn-sm btn-success" href="{{ route('transactions.edit',$transaction->id) }}"><i class="fa fa-fw fa-edit"></i></a>--}}
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
                                {{ $transactions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
