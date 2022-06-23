@extends('layouts.app-form')

@section('template_title')
    Questions
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Questions') }}
                            </span>

                            <div class="float-right">
                                <form method="get" action="{{route('prof-tests.create')}}">
                                    <input type="hidden" name="id" value="{{$test->id}}">

                                    <button class="btn btn-primary btn-sm float-right" type="submit">Create new</button>
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
                                    <th>Вопрос</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ \App\Models\Translate::whereId($question->title)->value('ru') }}</td>
                                        <td>
                                            <form action="{{route('prof-tests.destroy', $question->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-sm btn-success" href="{{route('prof-tests.edit', $question->id)}}"><i class="fa fa-fw fa-edit"></i></a>
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
