@extends('layouts.app-form')

@section('template_title')
    Videos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Видео курсы') }}
                            </span>

                            <div class="float-right">
                                <form action="{{route('video.create')}}" method="post">
                                    @method('get')
                                    <input type="hidden" name="course_intro_id" value="{{$intro['id']}}">
                                    <button class="btn btn-primary" type="submit">Создать новый</button>
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
                                    <th>Курс</th>
                                    <th>Название видео</th>
                                    <th>Ссылка на видео</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>{{ $intro->id }}</td>
                                        <td>{{ \App\Models\Video::whereId($video->video_id)->value('name') }}</td>
                                        <td>{{ \App\Models\Video::whereId($video->video_id)->value('link') }}</td>
                                        <td>
                                            <form action="{{route('video.destroy', $video->id)}}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{route('video.edit', $video->id)}}"><i class="fa fa-fw fa-edit"></i></a>
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
