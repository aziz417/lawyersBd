@extends('backend.layouts.master')
@section('title', 'Case')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong><a href="{{ route('case.manage') }}">Cases</a></strong>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Details</strong>
                </li>
            </ol>
            @if(Auth::user()->role == 'lawyer')
                <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"
                   href="{{ route('rate.show') }}"><i
                            class="fa fa-plus"></i> <strong>Your Rating</strong></a>
            @endif
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><strong>Case Details</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <div class="pull-right">
                                <a href="{{ url('chatify', Auth::user()->role == 'lawyer' ? $case->user->id : $case->lawyer->id) }}" title="Message">
                                    <div class="btn btn-primary cus_btn">
                                        <i class="fa fa-comment"></i> Message
                                    </div>
                                </a>
                                <form style="float: left" class="mr-2" action="{{ route('messages.index')}}" method="get"
                                      role="form">
                                    <input name="keyword" type="hidden"
                                           value="{{ Auth::user()->role == 'lawyer' ? $case->user->email : $case->lawyer->email }}"
                                    >
                                    <button type="submit" title="Email"
                                            class="btn btn-success cus_btn"><i class="fa fa-envelope"></i> Email
                                    </button>
                                </form>
                            </div>

                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>Case Title</th>
                                    <th>Case Type</th>
                                    <th>Case Date</th>
                                    <th>Case Cote Date</th>
                                    <th>{{ Auth::user()->role == 'lawyer' ? 'Client' : 'Lawyer' }} Name</th>
                                    <th>{{ Auth::user()->role == 'lawyer' ? 'Client' : 'Lawyer' }} Email</th>
                                    <th>{{ Auth::user()->role == 'lawyer' ? 'Client' : 'Lawyer' }} Phone Number</th>
                                    <th>Case Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $case_status = ['Chancel Case', 'New Case', 'Progressing', 'Running Case', 'In Complete Case', 'Case Successfully Done'];
                                @endphp
                                    <tr>
                                        <td width="200px">{{ $case->title }}</td>
                                        <td>{{ $case->type->title }}</td>
                                        <td>{{ $case->caseDate }}</td>
                                        <td>{{ $case->coteDate }}</td>

                                        @if(Auth::user()->role == 'lawyer')
                                            <td>{{ $case->user->applicants_name }}</td>
                                            <td>{{ $case->user->email }}</td>
                                            <td>{{ $case->user->mobile_number }}</td>
                                        @elseif(Auth::user()->role == 'user')
                                            <td>{{ $case->lawyer->applicants_name }}</td>
                                            <td>{{ $case->lawyer->email }}</td>
                                            <td>{{ $case->lawyer->mobile_number }}</td>
                                        @endif
                                        <td>
                                            <select {{ Auth::user()->role == 'user' ? 'disabled' : '' }} class="status_bg py-1 px-2" id="caseSubmitId-{{ $case->id }}">
                                                @foreach($case_status as $key => $status)
                                                    <option {{ $case->status == $key ? 'selected' : '' }} value="{{ $key }}" class="{{ $status }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @if(Auth::user()->role == 'lawyer')
                                                <button class="py-1 px-2" onclick="caseSumbit({{ $case->id }})">Update</button>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="">
{{--                                {{ dd($case) }}--}}
                                <h3>Case Details:</h3>
                                <p>{!! $case->description !!}</p>
                                <hr>
                                <h3>Documents:</h3>
                                <a target="_blank" href="{{ asset('uploads/documentations/'.$case->document) }}">Documents</a>

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
        function caseSumbit(id){
            const caseSubmitId = 'caseSubmitId-'+id;
            const caseId = id;
            const caseStatus = $("#"+caseSubmitId).val();
            $.get('{{ route('case.status.update') }}', { caseId: caseId, caseStatus: caseStatus}, function (response){
               if (response){
                   toastr.success('{{ session('successMsg', 'Case Status Successfully Update') }}')
               }
            })
        }
    </script>
@endpush

