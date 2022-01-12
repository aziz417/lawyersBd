@extends('backend.layouts.master')
@section('title', 'Lawyer Manage')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Rate Manage</strong>
                </li>
            </ol>
            <a href="javascript:history.back()"
               class="btn btn-sm btn-primary pull-right m-t-n-md"><strong>Back</strong></a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="pull-right btn btn-success" href="{{ route('rating.calculation') }}">Update Your Rating</a>
                                <h2 class="text-center my-4">Rating Panel:</h2>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Average Rate: </h2>
                                        <div class="card-body">
                                            <input id="average-rate" value="{{ $lawyer->rate->average_rate ?? 0 }}" class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Client Rate: </h2>
                                        <div class="card-body">
                                            <input id="client-rate" value="{{ $lawyer->rate->clint_rate ?? 0 }}" class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Case Rate: </h2>
                                        <div class="card-body">
                                            <input id="case-rate" value="{{ $lawyer->rate->case_rate ?? 0 }}" class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Education Rate: </h2>
                                        <div class="card-body">
                                            <input id="education-rate" value="{{ $lawyer->rate->education_rate ?? 0 }}" class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('#average-rate').rating({displayOnly: true});
            $('#case-rate').rating({displayOnly: true});
            $('#education-rate').rating({displayOnly: true});
            $('#client-rate').rating({displayOnly: true});
        });
    </script>
@endpush
