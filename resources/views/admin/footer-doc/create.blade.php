@extends('layouts.app-form')

@section('template_title')
    Create main page
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Главная страница</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('footer-doc.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="form-group">
                                    <label for="doc">Название</label>
                                    <input type="file" class="form-control" id="doc" name="doc" placeholder="Введите Название:">
                                    @if($errors->has('ru'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="type">Тип</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="oferta">Оферта</option>
                                        <option value="use">Правила пользования сайта</option>
                                        <option value="privacy">Политика конфеденциальности</option>
                                    </select>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Принять</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
