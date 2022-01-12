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
                                    <th>{{ Auth::user()->role == 'lawyer' ? 'Client' : 'Lawyer' }} Name</th>
                                    <th>{{ Auth::user()->role == 'lawyer' ? 'Client' : 'Lawyer' }} Email</th>
                                    <th>{{ Auth::user()->role == 'lawyer' ? 'Client' : 'Lawyer' }} Phone Number</th>
                                    <th>Case Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $case_status = ['Chancel Case', 'New Case', 'Progressing', 'Running Case', 'In Complete Case', 'Case Successfully Done'];
                                @endphp
                                @forelse($cases as $key => $case)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $case->title }}</td>
                                        <td>{{ $case->caseDate }}</td>
                                        <td>{{ $case->coteDate }}</td>
                                        @if(Auth::user()->role == 'lawyer')
                                            <td>{{ $case->register->applicants_name }}</td>
                                            <td>{{ $case->register->email }}</td>
                                            <td>{{ $case->register->mobile_number }}</td>
                                        @elseif(Auth::user()->role == 'user')
                                            <td>{{ $case->lawyer->applicants_name }}</td>
                                            <td>{{ $case->lawyer->email }}</td>
                                            <td>{{ $case->lawyer->mobile_number }}</td>
                                        @endif
                                        <td>
                                            <select class="status_bg py-1 px-2" id="caseSubmitId-{{ $case->id }}" {{ Auth::user()->role == 'user' ? 'disabled' : '' }}>
                                                @foreach($case_status as $key => $status)
                                                    <option {{ $case->status == $key ? 'selected' : '' }} value="{{ $key }}" class="{{ $status }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                            @if(Auth::user()->role == 'lawyer')
                                                <button class="py-1 px-2" onclick="caseSumbit({{ $case->id }})">Update</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('case.details', $case->id) }}" title="Details">
                                                <div class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </div>
                                            </a>
                                            <a href="{{ url('chatify', Auth::user()->role == 'lawyer' ? $case->register->id : $case->lawyer->id) }}" title="Message">
                                                <div class="btn btn-primary cus_btn">
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                            </a>
                                            <form class="mt-2" action="{{ route('messages.index')}}" method="get"
                                                  role="form">
                                                <input name="keyword" type="hidden"
                                                       value="{{ Auth::user()->role == 'lawyer' ? $case->user->email : $case->lawyer->email }}"
                                                >
                                                <button type="submit"
                                                        class="btn btn-success cus_btn"><i class="fa fa-envelope"></i>
                                                </button>
                                            </form>
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

