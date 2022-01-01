@extends('backend.layouts.master')

@section('title', 'Message Replies')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Message Replies</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Replies</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive m-t-md">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">User Name</th>
                                    <th class="text-left">User Email</th>
                                    <th class="text-left">Subject</th>
                                    <th class="text-left">Message</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td class="text-left">{{ ucfirst(Str::limit(@$message->name, 50)) }}</td>
                                    <td class="text-left">{{ @$message->email }}</td>
                                    <td class="text-left">{{ @$message->subject}}</td>
                                    <td class="text-left">{{ @$message->message}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3>Replies</h3>
                        <div class="table-responsive m-t-md">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">Replied By</th>
                                    <th class="text-left">Subject</th>
                                    <th class="text-left">Replied Message</th>
                                    <th class="text-left">Date</th>
                                    @canany(['message reply delete'])
                                        <th width="10%">Action</th>
                                    @endcanany
                                </tr>
                                </thead>

                                <tbody>
                                @foreach(@$replies as $reply)
                                    <tr>
                                        <td class="text-left">{{ ucfirst(Str::limit(@$reply->createdUser->name, 50)) }}</td>
                                        <td class="text-left">{{ ucfirst(@$reply->reply_subject) }}</td>
                                        <td class="text-left">{{ @$reply->reply_message}}</td>
                                        <td class="text-left">{{ @$reply->created_at->format('d-m-Y H:i:s') }}</td>
                                        @canany(['message reply delete'])
                                            <td>
                                                @can('message reply delete')
                                                    <button onclick="deleteRow({{ @$reply->id }})"
                                                            href="JavaScript:void(0)"
                                                            title="Delete" class="btn btn-danger btn-sm cus_btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                    <form id="row-delete-form{{ @$reply->id }}" method="POST"
                                                          class="d-none"
                                                          action="{{ route('admin.replies.destroy', @$reply->id) }}">
                                                        @method('DELETE')
                                                        @csrf()
                                                    </form>
                                                @endcan
                                            </td>
                                        @endcanany
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if (count(@$replies))
                                {{ @$replies->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                            @else
                                <div class="text-center">No Replies found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

