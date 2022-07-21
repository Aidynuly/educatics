@extends('layouts.app-form')

@section('template_title')
    Create Tariff
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Tariff</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tariff-texts.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tariff_id" value="{{$tariff->id}}">
                            <label>Текст скидки</label>
                            <div class="card-body">
                                <div class="card-header">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#discount_ru" data-toggle="tab">Russian</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#discount_en" data-toggle="tab">English</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#discount_kz" data-toggle="tab">Kazakh</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="discount_ru">
                                            <div class="form-group">
                                                <label for="discount_ru">RU</label>
                                                <textarea type="text" class="ckeditor form-control" id="discount_ru" name="discount_ru" placeholder="Введите название:">
                                                    {{isset($tariffText->text) ? \App\Models\Translate::where('id', $tariffText->text)->value('ru') : ''}}
                                                </textarea>
                                                @if($errors->has('discount_ru'))
                                                    <span class="text-danger">{{$errors->first('discount_ru')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="discount_kz">
                                            <div class="form-group" id="discount_kz">
                                                <label for="discount_kz">KZ</label>
                                                <textarea type="text" class="ckeditor form-control" id="discount_kz" name="discount_kz" placeholder="Введите название:">
                                                    {{isset($tariffText->text) ? \App\Models\Translate::where('id', $tariffText->text)->value('kz') : ''}}
                                                </textarea>
                                                @if($errors->has('discount_kz'))
                                                    <span class="text-danger">{{$errors->first('discount_kz')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="discount_en">
                                            <div class="form-group" id="discount_en">
                                                <label for="discount_en">EN</label>
                                                <textarea type="text" class="ckeditor form-control" id="discount_en" name="discount_en" placeholder="Введите название:">
                                                    {{isset($tariffText->text) ? \App\Models\Translate::where('id', $tariffText->text)->value('en') : ''}}
                                                 </textarea>

                                                @if($errors->has('discount_en'))
                                                    <span class="text-danger">{{$errors->first('discount_en')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
