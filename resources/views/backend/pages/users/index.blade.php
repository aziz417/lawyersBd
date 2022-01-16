@extends('backend.layouts.master')
@section('title', $type)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>{{ $type }}s</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><strong>{{ $type }}s</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Gmail</th>
                                    <th>Contact</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->applicants_name }}</td>
                                        <td><img width="100" height="120"  src="{{ $user->image }}" alt="'profile image"></td>
                                        <td>{{ $user->mobile_number }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ url('chatify/', $user->id) }}" title="Message">
                                                <div class="btn btn-primary cus_btn">
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                            </a>
                                            <form class="mt-2" action="{{ route('messages.index')}}" method="get"
                                                  role="form">
                                                <input name="keyword" type="hidden"
                                                       value="{{ $user->email }}"
                                                >
                                                <button type="submit"
                                                        class="btn btn-success cus_btn"><i class="fa fa-envelope"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-center text-danger">No {{ $type }}</p>
                                @endforelse
                                </tbody>
                            </table>
{{--                            {{ $users->links('backend.component.pagination') }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush

