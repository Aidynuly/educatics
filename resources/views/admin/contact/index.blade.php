@extends('layouts.app')

@section('template_title')
    Contact
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Контакты') }}
                            </span>

                             <div class="float-right">
{{--                                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                  {{ __('Создать новый') }}--}}
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
                                        <th>№</th>

										<th>Тип</th>
										<th>Данные</th>
										<th>Иконка</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->id }}</td>
											<td>{{ $contact->type }}</td>
											<td>{{ $contact->phone }}</td>
											<td>{{ $contact->icon }}</td>
                                            <td>
                                                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('contacts.edit',$contact->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
