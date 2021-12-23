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
                    <strong>Case</strong>
                </li>
            </ol>
            <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"
               href="{{ route('rate.show') }}"><i
                        class="fa fa-plus"></i> <strong>Your Rating</strong></a>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><strong>Cases</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>Case Title</th>
                                    <th>Case Type</th>
                                    <th>Case Date</th>
                                    <th>Case Cote Date</th>
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Client Phone Number</th>
                                    <th>Case Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $case_status = ['New Case', 'Progressing', 'Running Case', 'In Complete Case', 'Chancel Case', 'Case Successfully Done'];
                                @endphp
                                    <tr>
                                        <td width="200px">{{ $case->title }}</td>
                                        <td>{{ $case->type->title }}</td>
                                        <td>{{ $case->caseDate }}</td>
                                        <td>{{ $case->coteDate }}</td>
                                        <td>{{ $case->user()->first()->register()->first()->applicants_name }}</td>
                                        <td>{{ $case->user()->first()->register()->first()->email }}</td>
                                        <td>{{ $case->user()->first()->register()->first()->mobile_number }}</td>
                                        <td>
                                            <select class="status_bg py-1 px-2" id="caseSubmitId-{{ $case->id }}">
                                                @foreach($case_status as $key => $status)
                                                    <option {{ $case->status == $key ? 'selected' : '' }} value="{{ $key }}" class="{{ $status }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            <button class="py-1 px-2" onclick="caseSumbit({{ $case->id }})">Update</button>
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

