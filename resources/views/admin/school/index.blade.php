@extends('layouts.app')

@section('template_title')
    School
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('School') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('schools.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>Название</th>
                                        <th>Русский</th>
                                        <th>Английский</th>
                                        <th>Казахский</th>
                                        <th>Город</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <td>{{ $school->id }}</td>
                                            <td></td>
                                            <td>{{ App\Models\Translate::whereId($school->name)->value('ru') }}</td>
                                            <td>{{ App\Models\Translate::whereId($school->name)->value('en') }}</td>
                                            <td>{{ App\Models\Translate::whereId($school->name)->value('kz') }}</td>
                                            <td>{{ \App\Models\Translate::whereId(\App\Models\City::whereId($school->city_id)->value('title'))->value('ru') }}</td>
                                            <td>
                                                <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
{{--                                                    <a class="btn btn-sm btn-primary " href="{{ route('schools.show',$school->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>--}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('schools.edit',$school->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Delete</button>
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
