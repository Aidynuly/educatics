@extends('layouts.app-form')

@section('template_title')
    Update social
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update social</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('social.update', $url->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                <label for="url">Ссылку на соц. сеть</label>
                                <input type="text" class="form-control" name="url" value="{{$url->url}}">
                            </div>


                            <button class="btn btn-success" type="submit">Принять</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
