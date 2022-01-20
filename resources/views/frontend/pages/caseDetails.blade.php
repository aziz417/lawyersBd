@extends('frontend.layout.app')
@section('style')
    <style type="text/css">
    </style>
@endsection
@section('content')

    {{--    message--}}
    @include('flashMsg')
    <section style="margin-top: 55px !important;" id="consultation" class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h2 class="text-center"><strong>Case Details</strong></h2>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'lawyer')
                                        <div class="pull-right">
                                            <a href="{{ url('chatify', $case->user->id) }}" title="Message">
                                                <div class="btn btn-primary cus_btn">
                                                    <i class="fa fa-comment"></i> Message
                                                </div>
                                            </a>
                                            <form style="float: left" class="mr-2" action="{{ route('messages.index')}}"
                                                  method="get"
                                                  role="form">
                                                <input name="keyword" type="hidden"
                                                       value="{{ $case->user->email }}"
                                                >
                                                <button type="submit" title="Email"
                                                        class="btn btn-success cus_btn"><i class="fa fa-envelope"></i>
                                                    Email
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endif

                                <table class="table table-hover contactDataTable">
                                    <thead>
                                    <tr>
                                        <th>Case Title</th>
                                        <th>Case Type</th>
                                        <th>Case Date</th>
                                        <th>Case Cote Date</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td width="200px">{{ $case->title }}</td>
                                        <td>{{ @$case->type->title }}</td>
                                        <td>{{ $case->caseDate }}</td>
                                        <td>{{ $case->coteDate }}</td>
                                        <td>{{ $case->register->applicants_name }}</td>
                                        <td>{{ $case->register->email }}</td>
                                        <td>{{ $case->register->mobile_number }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="">
                        {{--                                {{ dd($case) }}--}}
                        <h3>Case Details:</h3>
                        <p>{!! $case->description !!}</p>
                        <hr>
                        <h3>Documents:</h3>
                        <a target="_blank" href="{{ asset('uploads/documentations/'.$case->document) }}">Documents</a>

                    </div>
                </div>
                @if(Auth::check())
                    @if(Auth::user()->role == 'user')
                        <div class="col-sm-4">
                            @if($case->submittedLawyers)
                                <div class="team-box">

                                    <div class="team-detail">
                                        <h2 style="margin-top: 0; color: green">Applied Lawyer List</h2>

                                        @forelse($case->submittedLawyers as $lawyer)
                                            <h3 style="margin-top: 0" class="mt-0">
                                                <strong>Name:</strong> {{ ucfirst(Str::limit($lawyer->name, 50)) }}</h3>
                                            <a class="btn btn-primary"
                                               href="{{ route('lawyer.details', $lawyer->id) }}">Details</a>
                                            <a class="btn btn-success"
                                               href="{{ route('lawyer.hire', ['case' => $case->id, 'lawyer' => $lawyer->id]) }}">Accept</a>
                                            <hr>
                                        @empty
                                            <p>Applied 0</p>
                                        @endforelse
                                    </div>


                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
    </section>
@endsection
@section('script')
@endsection
