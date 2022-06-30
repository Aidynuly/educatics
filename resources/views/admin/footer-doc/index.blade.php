@extends('layouts.app')

@section('template_title')
    Feedback
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Документы') }}
                            </span>

                                                        <div class="float-right">
                                                            <a href="{{ route('footer-doc.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th>Тип</th>
                                    <th>Ссылка</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($docs as $doc)
                                    <tr>
                                        <td>{{ $doc->id }}</td>
                                        @if($doc->type == 'use')
                                            <td>Правила пользования сайтом</td>
                                        @elseif($doc->type == 'oferta')
                                            <td>Оферта</td>
                                        @else
                                            <td>Конфиденциальность</td>
                                        @endif
                                        <td>
                                            <a href="https://jaryk-back.test-nomad.kz/{{$doc->url}}" download>https://jaryk-back.test-nomad.kz/{{$doc->url}}</a>
                                        </td>

                                        <td>
                                            <form action="{{ route('footer-doc.destroy',$doc->id) }}" method="POST">
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
