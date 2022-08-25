@extends('layouts.app')

@section('template_title')
    Url
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Social') }}
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
                                    <th>Тип</th>
                                    <th>Ссылка</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($urls as $url)
                                    <tr>
                                        <td>{{ $url->id }}</td>
                                        <td>{{ $url->type }}</td>
                                        <td>{{ $url->url }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="{{ route('social.edit',$url->id) }}"><i class="fa fa-fw fa-edit"></i></a>
{{--                                            <form action="{{ route('social.destroy',$url->id) }}" method="POST">--}}
{{--                                                <a class="btn btn-sm btn-success" href="{{ route('social.edit',$url->id) }}"><i class="fa fa-fw fa-edit"></i></a>--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>--}}
{{--                                            </form>--}}
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
