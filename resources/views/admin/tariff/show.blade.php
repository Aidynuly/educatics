@extends('layouts.app-form')

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
                                {{ __('Tariff') }}
                            </span>

                            <div class="float-right">
                                <form action="{{ route('tariff-texts.create') }}" method="get">
                                    <input type="hidden" name="tariff_id" value="{{$tariff->id}}">
                                    <button type="submit" class="btn btn-primary btn-sm float-right">
                                        {{ __('Создать текст') }}
                                    </button>
                                </form>
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
                                    <th>Тариф</th>
                                    <th>Текст</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($texts as $text)
                                    <tr>
                                        <td>{{ $text->id }}</td>
                                        <td>{{ $text->tariff_id }}</td>
                                        <td>{{ \App\Models\Translate::whereId($text->text)->value('ru') }}</td>

                                        <td>
                                            <form action="{{ route('tariff-texts.destroy',$text->id) }}" method="POST">
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
