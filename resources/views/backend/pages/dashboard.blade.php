@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#"><strong>Dashboard</strong></a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content text-center p-md">
                        <h2><span class="text-navy">Welcome <span
                                        class="text-danger font-bold">{{ Auth()->user()->role }}</span> Dashboard</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            @if(Auth::user()->role == 'admin')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ @$usersCount ? @$usersCount->count() : 0 }}</h3>
                            <p>Lawyers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('all.users', 'lawyer') }}" class="small-box-footer">More info</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ @$usersCount ? @$usersCount->count() : 0 }}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('all.users', 'user') }}" class="small-box-footer">More info</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ @$caseCategoryCount ? @$caseCategoryCount->count() : 0 }}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-ul"></i>
                        </div>
                        <a href="{{ route('categories.index') }}" class="small-box-footer">More info</a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ @$caseTypesCount ? @$caseTypesCount->count() : 0 }}</h3>
                            <p>Case Types</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-shield"></i>
                        </div>
                        <a href="{{ route('caseTypes.index') }}" class="small-box-footer">More info</a>
                    </div>
                </div>
            @endif
            @if(Auth::user()->role == 'lawyer' || Auth::user()->role == 'user')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ @$allCase ? @$allCase->count() : 0 }}</h3>
                            <p>All Case</p>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="{{ route('case.manage') }}" class="small-box-footer">More info</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ @$successCase ? @$successCase->count() : 0 }}</h3>
                            <p>Success Case</p>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="{{ route('case.showWithStatus', 5) }}" class="small-box-footer">More info</a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ @$newCase ? @$newCase->count() : 0 }}</h3>
                            <p>New Case</p>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="{{ route('case.showWithStatus', 1) }}" class="small-box-footer">More info</a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ @$inProgressCase ? @$inProgressCase->count() : 0 }}</h3>
                            <p>Progress Case</p>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="{{ route('case.showWithStatus', 2) }}" class="small-box-footer">More info</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ @$runningCase ? @$runningCase->count() : 0 }}</h3>
                            <p>Running Case</p>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="{{ route('case.showWithStatus', 3) }}" class="small-box-footer">More info</a>
                    </div>
                </div>

            @endif

            {{--            <div class="col-lg-3 col-6">--}}
            {{--                <!-- small box -->--}}
            {{--                <div class="small-box bg-primary">--}}
            {{--                    <div class="inner">--}}
            {{--                        <h3>{{ @$subscribers->count() }}</h3>--}}
            {{--                        <p>Subscribers</p>--}}
            {{--                    </div>--}}
            {{--                    <div class="icon">--}}
            {{--                        <i class="fa fa-user-shield"></i>--}}
            {{--                    </div>--}}
            {{--                    <a href="{{ route('admin.subscribers.index') }}" class="small-box-footer">More info <i--}}
            {{--                                class="fas fa-arrow-circle-right"></i></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!-- ./col -->--}}
            {{--            <div class="col-lg-3 col-6">--}}
            {{--                <!-- small box -->--}}
            {{--                <div class="small-box bg-danger">--}}
            {{--                    <div class="inner">--}}
            {{--                        <h3>{{ @$categories->count() }}</h3>--}}

            {{--                        <p>Categories</p>--}}
            {{--                    </div>--}}
            {{--                    <div class="icon">--}}
            {{--                        <i class="fa fa-list-ul"></i>--}}
            {{--                    </div>--}}
            {{--                    <a href="{{ route('admin.categories.index') }}" class="small-box-footer">More info <i--}}
            {{--                                class="fas fa-arrow-circle-right"></i></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!-- ./col -->--}}

            {{--            <!-- ./col -->--}}
            {{--            <div class="col-lg-3 col-6">--}}
            {{--                <!-- small box -->--}}
            {{--                <div class="small-box bg-dark">--}}
            {{--                    <div class="inner">--}}
            {{--                        <h3>{{ @$monthlyVisits }}</h3>--}}

            {{--                        <p>Last {{ @count($analyticsData) - 1 }} day's Visits</p>--}}
            {{--                    </div>--}}
            {{--                    <div class="icon">--}}
            {{--                        <i class="fa fa-eye"></i>--}}
            {{--                    </div>--}}
            {{--                    <a href="javascript:void(0)" class="small-box-footer">More info <i--}}
            {{--                                class="fas fa-arrow-circle-right"></i></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!-- ./col -->--}}

            {{--            <!-- ./col -->--}}
            {{--            <div class="col-lg-3 col-6">--}}
            {{--                <!-- small box -->--}}
            {{--                <div class="small-box bg-info">--}}
            {{--                    <div class="inner">--}}
            {{--                        <h3>{{ @$todayVisits }}</h3>--}}

            {{--                        <p>Today's Visits</p>--}}
            {{--                    </div>--}}
            {{--                    <div class="icon">--}}
            {{--                        <i class="fa fa-eye"></i>--}}
            {{--                    </div>--}}
            {{--                    <a href="javascript:void(0)" class="small-box-footer">More info <i--}}
            {{--                                class="fas fa-arrow-circle-right"></i></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <!-- ./col -->--}}

            {{--            <div class="col-lg-12 col-12">--}}
            {{--                <div class="card">--}}
            {{--                    <div class="card-body pb-0">--}}
            {{--                        <div id="chart"></div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>

@endsection
