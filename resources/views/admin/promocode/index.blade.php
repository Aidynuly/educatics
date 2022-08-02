@extends('layouts.app')

@section('template_title')
    Promocode
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Промокоды') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('promocodes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>№</th>
										<th>Название</th>
										<th>Промокод</th>
										<th>Процент</th>
										<th>Статус</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promocodes as $promocode)
                                        <tr>
                                            <td>{{ $promocode->id }}</td>
											<td>{{ $promocode->title }}</td>
											<td>{{ $promocode->code }}</td>
											<td>{{ $promocode->procent }}%</td>
											<td>
                                                @if($promocode->status == 'in_process')
                                                    В процессе
                                                @else
                                                    Использован
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('promocodes.destroy',$promocode->id) }}" method="POST">
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
                <div class="d-flex justify-content-center">
                    {!! $promocodes->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
