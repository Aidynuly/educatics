@extends('layouts.app')

@section('template_title')
Course
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Страница мероприятии') }}
                        </span>
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
                                    <th>Картинка</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($texts as $text)
                                <tr>
                                    <td>{{ $text->id }}</td>
                                    <td>
                                        @if(isset($text->image))
                                        <img src="{{url($text->image)}}" width="200px" height="100px">
                                        @else
                                        @endif
                                    </td>
                                    <td>{{ App\Models\Translate::whereId($text->title)->value('ru') }}</td>
                                    <td>{{ App\Models\Translate::whereId($text->description)->value('ru') }}</td>

                                    <td>
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('event-page.edit',$text->id) }}"><i
                                                class="fa fa-fw fa-edit"></i></a>
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