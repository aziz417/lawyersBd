@extends('backend.layouts.master')
@section('title', 'Clients')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Clients</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><strong>Clients</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Image</th>
                                    <th>Case Title</th>
                                    <th>Case Status</th>
                                    <th>Client Phone Number</th>
                                    <th>Client Email</th>
                                    <th>Contact</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $case_status = ['Chancel Case', 'New Case', 'Progressing', 'Running Case', 'In Complete Case', 'Case Successfully Done'];
                                @endphp
                                @forelse($clients as $key => $case)
                                    <tr>
                                        <td>{{ $case->user()->first()->register()->first()->applicants_name }}</td>
                                        <td><img src="{{ $case->user()->first()->register()->first()->image()->where('type', 'profile')->first()->url ?? '' }}"></td>
                                        <td>{{ $case->title }}</td>
                                        <td>{{ $case_status[$case->status] }}</td>
                                        <td>{{ $case->user()->first()->register()->first()->mobile_number }}</td>
                                        <td>{{ $case->user()->first()->register()->first()->email }}</td>
                                        <td>
                                            <form action="{{ route('messages.index')}}" method="get"
                                                  role="form">
                                                <input name="keyword" type="hidden"
                                                       value="{{ $case->user()->first()->register()->first()->email }}"
                                                       >
                                                <button type="submit"
                                                        class="btn btn-sm btn-primary custom_field_height"> Email
                                                </button>
                                            </form>
                                            <a class="btn btn-sm btn-success mt-3 custom_field_height" href="{{ url('chatify/'.$case->user()->first()->register()->first()->user_id) }}">Message</a>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-center text-danger">No data</p>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $clients->links('backend.component.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

@endpush

