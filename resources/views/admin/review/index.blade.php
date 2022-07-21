@extends('layouts.app')

@section('template_title')
    Review
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Отзывы') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('reviews.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th>Фотография</th>
                                    <th>Тип</th>
                                    <th>Имя</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Школа</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td><img src="{{url($review->image)}}" class="img-circle elevation-2" alt="User Image" width="150px" height="150px"></td>
                                        @if($review->type == 'children')
                                            <td>Ученик</td>
                                        @else
                                            <td>Родители</td>
                                        @endif
                                        <td>{{ $review->name }}</td>
                                        <td>{{\App\Models\Translate::whereId($review->title)->value('ru') }}</td>
                                        <td>{{\App\Models\Translate::whereId($review->description)->value('ru') }}</td>
                                        <td>{{ $review->school_name }}</td>
                                        <td>
                                            <form action="{{ route('reviews.destroy',$review->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('reviews.edit',$review->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
