@extends('layouts.app')

@section('template_title')
    About U
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('About U') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('about-us.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>RU</th>
										<th>KZ</th>
										<th>EN</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutUs as $aboutU)
                                        <tr>
                                            <td>{{ $aboutU->id }}</td>
											<td>{{\App\Models\Translate::whereId($aboutU->description)->value('ru')}}</td>
											<td>{{\App\Models\Translate::whereId($aboutU->description)->value('kz')}}</td>
											<td>{{\App\Models\Translate::whereId($aboutU->description)->value('en')}}</td>
                                            <td>
                                                <form action="{{ route('about-us.destroy',$aboutU->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('about-us.edit',$aboutU->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
