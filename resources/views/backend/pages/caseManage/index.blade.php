@extends('backend.layouts.master')
@section('title', 'Cases')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Cases</strong>
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
                                    <th>#</th>
                                    <th>Case Title</th>
                                    <th>Case Date</th>
                                    <th>Case Cote Date</th>
                                    <th>Client Email</th>
                                    <th>Client Phone Number</th>
                                    <th>Case Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $case_status = ['New Case', 'Progressing', 'Running Case', 'In Complete Case', 'Chancel Case', 'Case Successfully Done'];
                                @endphp
                                @forelse($cases as $key => $case)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $case->title }}</td>
                                        <td>{{ $case->caseDate }}</td>
                                        <td>{{ $case->coteDate }}</td>
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
                                        <td>
                                            <a href="{{ route('case.details', $case->id) }}" title="Show">
                                                <div class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i> <strong>Details</strong>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-center text-danger">No data</p>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $cases->links('backend.component.pagination') }}
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

