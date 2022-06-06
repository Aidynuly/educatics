@extends('layouts.app-form')

@section('template_title')
    Tests
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Тесты') }}
                            </span>

                            <div class="float-right">
                                <form action="{{route('test.create')}}" method="post">
                                    @method('get')
                                    <input type="hidden" name="intro_id" id="intro_id" value="{{$introId}}">
                                    <button class="btn btn-primary" type="submit">{{ __('Создать новый') }}</button>
                                </form>
{{--                                <a href="{{ route('test.create', $introId) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
{{--                                    <input type="hidden" name="intro_id" id="intro_id" value="{{$introId}}">--}}
{{--                                    {{ __('Создать новый') }}--}}
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
                                        <th>Название теста</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>{{ $test->id }}</td>
                                        <td>{{ \App\Models\Translate::whereId($test->title)->value('ru') }}</td>
                                        <td>
                                            <form action="{{route('test.destroy', $test->id)}}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{route('test.edit', $test->id)}}"><i class="fa fa-fw fa-edit"></i></a>
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
