@extends('layouts.app')

@section('template_title')
    Footer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Футеры') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('footer.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('СОЗДАТЬ НОВЫЙ') }}
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
                                    <th>Картинка</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Блок</th>
                                    <th>Ссылка</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($footers as $footer)
                                    <tr>
                                        <td>{{ $footer->id }}</td>
                                        <td>
                                            @if(isset($footer->image))
                                                <img src="{{url($footer->image)}}" width="200px" height="100px">
                                            @else

                                            @endif
                                        </td>
                                        <td>{{ App\Models\Translate::whereId($footer->title)->value('ru') }}</td>
                                        <td>{{ App\Models\Translate::whereId($footer->description)->value('ru') }}</td>
                                        <td>{{$footer->block}}</td>
                                        <td>{{$footer->link}}</td>
                                        <td>
                                            @if($footer->block == 1)
                                                <a class="btn btn-sm btn-success" href="{{ route('footer.edit',$footer->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            @else
                                            <form action="{{ route('footer.destroy',$footer->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('footer.edit',$footer->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                            @endif
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
