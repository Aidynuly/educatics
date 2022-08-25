@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Аналитика за месяц</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Транзакции: {{$firstDay}} : {{ $lastDay }}</strong>
                            </p>

                            <div class="chart">
                                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Количество:</strong>
                            </p>

                            <div class="progress-group">
                                Успешные
                                <span class="float-right"><b>{{count($successTransactions)}}</b>/{{count($transactions)}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 80%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                В процессе
                                <span class="float-right"><b>{{count($processTransactions)}}</b>/{{count($transactions)}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" style="width: 75%"></div>
                                </div>
                            </div>

                            <div class="progress-group">
                                <span class="progress-text">Отказ</span>
                                <span class="float-right"><b>{{count($rejectTransactions)}}</b>/{{count($transactions)}}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                {{--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>--}}
                                <h5 class="description-header">${{$successSum}}</h5>
                                <span class="description-text">Сумма прибыли</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                {{--                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>--}}
                                <h5 class="description-header">${{$rejectSum}}</h5>
                                <span class="description-text">Сумма отказа</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                {{--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>--}}
                                <h5 class="description-header">${{$processSum}}</h5>
                                <span class="description-text">Сумма в процессе</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Статистика курсов</h3>
                                </div>
                                <div class="card-body">
                                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6"></div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example2"
                                                       class="table table-bordered table-hover dataTable dtr-inline collapsed"
                                                       aria-describedby="example2_info">
                                                    <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="example2" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending">
                                                            Название курса
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            Общее количество студентов
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Количество студентов, которые учатся
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Количество студентов, которые закончили
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Количество студентов, которые отклонили:
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($courses as $course)
                                                        <tr class="odd">
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{\App\Models\Translate::whereId($course->title)->value('ru')}}
                                                            </td>
                                                            <td>
                                                                {{App\Models\UserCourse::whereCourseId($course->id)->count()}}
                                                            </td>
                                                            <td>
                                                                {{App\Models\UserCourse::whereCourseId($course->id)->where('status', App\Models\UserCourse::STATUS_IN_PROCESS)->count()}}
                                                            </td>
                                                            <td>
                                                                {{App\Models\UserCourse::whereCourseId($course->id)->where('status', App\Models\UserCourse::STATUS_FINISHED)->count()}}
                                                            </td>
                                                            <td>
                                                                {{App\Models\UserCourse::whereCourseId($course->id)->where('status', App\Models\UserCourse::STATUS_DECLINED)->count()}}
                                                            </td>
                                                            <td style="display: none;">1.7</td>
                                                            <td style="display: none;">A</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
{{--                                                    <tfoot>--}}
{{--                                                    <tr>--}}
{{--                                                        <th rowspan="1" colspan="1">Rendering engine</th>--}}
{{--                                                        <th rowspan="1" colspan="1">Browser</th>--}}
{{--                                                        <th rowspan="1" colspan="1">Platform(s)</th>--}}
{{--                                                        <th rowspan="1" colspan="1" style="display: none;">Engine--}}
{{--                                                            version--}}
{{--                                                        </th>--}}
{{--                                                        <th rowspan="1" colspan="1" style="display: none;">CSS grade--}}
{{--                                                        </th>--}}
{{--                                                    </tr>--}}
{{--                                                    </tfoot>--}}
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="example2_info" role="status"
                                                     aria-live="polite">Остальные курсы в других страницах
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                     id="example2_paginate">
                                                    <ul class="pagination">
                                                        <div class="d-flex justify-content-center">
                                                            {{ $courses->links() }}
                                                        </div>
{{--                                                        <li class="paginate_button page-item previous disabled"--}}
{{--                                                            id="example2_previous"><a href="#" aria-controls="example2"--}}
{{--                                                                                      data-dt-idx="0" tabindex="0"--}}
{{--                                                                                      class="page-link">Previous</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item active"><a href="#"--}}
{{--                                                                                                        aria-controls="example2"--}}
{{--                                                                                                        data-dt-idx="1"--}}
{{--                                                                                                        tabindex="0"--}}
{{--                                                                                                        class="page-link">1</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                                  aria-controls="example2"--}}
{{--                                                                                                  data-dt-idx="2"--}}
{{--                                                                                                  tabindex="0"--}}
{{--                                                                                                  class="page-link">2</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                                  aria-controls="example2"--}}
{{--                                                                                                  data-dt-idx="3"--}}
{{--                                                                                                  tabindex="0"--}}
{{--                                                                                                  class="page-link">3</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                                  aria-controls="example2"--}}
{{--                                                                                                  data-dt-idx="4"--}}
{{--                                                                                                  tabindex="0"--}}
{{--                                                                                                  class="page-link">4</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                                  aria-controls="example2"--}}
{{--                                                                                                  data-dt-idx="5"--}}
{{--                                                                                                  tabindex="0"--}}
{{--                                                                                                  class="page-link">5</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item "><a href="#"--}}
{{--                                                                                                  aria-controls="example2"--}}
{{--                                                                                                  data-dt-idx="6"--}}
{{--                                                                                                  tabindex="0"--}}
{{--                                                                                                  class="page-link">6</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="paginate_button page-item next" id="example2_next"><a--}}
{{--                                                                href="#" aria-controls="example2" data-dt-idx="7"--}}
{{--                                                                tabindex="0" class="page-link">Next</a></li>--}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
