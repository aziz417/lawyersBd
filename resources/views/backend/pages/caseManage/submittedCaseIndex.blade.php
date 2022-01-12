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
                                    @if(Auth::user()->role == 'user')
                                        <th>Applied</th>
                                    @endif
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Auth::user()->role == 'user')

                                    @forelse($cases as $key => $case)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $case->title }}</td>
                                            <td>{{ $case->submittedLawyers()->count() }}</td>
                                            <td>
                                                <a href="{{ route('applied.case.details', $case->id) }}"
                                                   title="Details">
                                                    <div class="btn btn-info cus_btn">
                                                        <i class="fa fa-pencil-square-o"></i> Details
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-danger">No data</p>
                                    @endforelse
                                @endif
                                @if(Auth::user()->role == 'lawyer')
                                    @forelse($submittedCases as $key => $case)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $case->title }}</td>
                                            <td>
                                                <a href="{{ route('applied.case.details', $case->id) }}"
                                                   title="Details">
                                                    <div class="btn btn-info cus_btn">
                                                        <i class="fa fa-pencil-square-o"></i> Details
                                                    </div>
                                                </a>
                                                <a href="{{ url('chatify', $case->user->id ) }}"
                                                   title="Message">
                                                    <div class="btn btn-primary cus_btn">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                </a>
                                                <form class="mt-2" action="{{ route('messages.index')}}" method="get"
                                                      role="form">
                                                    <input name="keyword" type="hidden"
                                                           value="{{ $case->user->email }}"
                                                    >
                                                    <button type="submit"
                                                            class="btn btn-success cus_btn"><i
                                                                class="fa fa-envelope"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center text-danger">No data</p>
                                    @endforelse
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function caseSumbit(id) {
            const caseSubmitId = 'caseSubmitId-' + id;
            const caseId = id;
            const caseStatus = $("#" + caseSubmitId).val();
            $.get('{{ route('case.status.update') }}', {caseId: caseId, caseStatus: caseStatus}, function (response) {
                if (response) {
                    toastr.success('{{ session('successMsg', 'Case Status Successfully Update') }}')
                }
            })
        }
    </script>
@endpush

