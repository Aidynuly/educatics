@extends('layouts.app')

@section('template_title')
    faq
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('FAQ') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('faq.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{\App\Models\Translate::whereId($faq->title)->value('ru') }}</td>
                                        <td>{{\App\Models\Translate::whereId($faq->description)->value('ru') }}</td>
                                        <td>
                                            <form action="{{ route('faq.destroy',$faq->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('faq.edit',$faq->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $faqs->links() !!}
            </div>
        </div>
    </div>
@endsection
