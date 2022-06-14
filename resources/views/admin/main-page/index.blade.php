@extends('layouts.app')

@section('template_title')
    Главная страница
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Main page') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('main-page.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Название</th>
										<th>Описание</th>
										<th>Иконка</th>
										<th>Ссылка на видео</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $page->id }}</td>
											<td>{{ \App\Models\Translate::whereId(\App\Models\Mainpage::where('id', $page->id)->value('title'))->value('ru') }}</td>
											<td>{{ \App\Models\Translate::whereId(\App\Models\Mainpage::where('id', $page->id)->value('description'))->value('ru') }}</td>
                                            <td>
                                                <img src="https://jaryk-back.test-nomad.kz/{{$page->icon}}" class="img-circle elevation-2" width="300px" height="150px" alt="User Image">
                                            </td>
                                            <td>{{ $page->video_url }}</td>
                                            <td>
                                                <form action="{{ route('main-page.destroy',$page->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('main-page.edit',$page->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
