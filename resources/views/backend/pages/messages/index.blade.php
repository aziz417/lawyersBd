@extends('backend.layouts.master')

@section('title', 'Messages')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Messages</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Messages</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('messages.index')}}" method="get"
                                      role="form">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="perPage" class="control-label">Records Per Page</label>
                                                </div>
                                                <div class="col-md-4 pr-0 responsive_p_r_15">
                                                    <select name="perPage" id="perPage" onchange="submit()"
                                                            class="input-sm form-control custom_field_height">
                                                        <option
                                                                value="10"{{ request('perPage') == 10 ? ' selected' : '' }}>
                                                            10
                                                        </option>
                                                        <option
                                                                value="25"{{ request('perPage') == 25 ? ' selected' : '' }}>
                                                            25
                                                        </option>
                                                        <option
                                                                value="50"{{ request('perPage') == 50 ? ' selected' : '' }}>
                                                            50
                                                        </option>
                                                        <option
                                                                value="100"{{ request('perPage') == 100 ? ' selected' : '' }}>
                                                            100
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 pl-sm-1 pr-sm-1 responsive_p_t_f_5">
                                                    <div class="float-left input-group">
                                                        <input name="keyword" type="text"
                                                               value="{{ request('keyword') }}"
                                                               class="input-sm form-control" placeholder="Search Here">
                                                        <span class="input-group-btn">
                                                        <button type="submit"
                                                                class="btn btn-sm btn-primary custom_field_height"> Go!</button>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 p-0 responsive_p_l_15">
                                                <span>
                                                    <a href="{{ route('messages.index') }}"
                                                       class="btn btn-default btn-sm custom_field_height">Reset
                                                    </a>
                                                </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="table-responsive m-t-md">
                            <div class="d-flex mb-2">
                                <button class="btn btn-sm btn-success mr-2 sendMailSelectedMessageBtn">Send mail to
                                    selected messages
                                </button>
                                <button class="btn btn-sm btn-info sendMailAllMessagesBtn">Send mail to all messages
                                </button>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left" width="75">
                                        <input type="checkbox" id="checkAll"> <label for="checkAll">All</label>
                                    </th>

                                    <th class="text-left">User Name</th>
                                    <th class="text-left">User Email</th>
                                    <th class="text-left">Subject</th>
                                    <th class="text-left">Message</th>
                                    <th>Replied Count</th>
                                    <th width="25%">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach(@$messages as $message)
                                    <tr>
                                        <td class="text-left">
                                            <input type="checkbox" value="{{ $message->id }}" class="checkedMe">
                                        </td>
                                        <td class="text-left">{{ ucfirst(Str::limit(@$message->name, 50)) }}</td>
                                        <td class="text-left">{{ @$message->email }}</td>
                                        <td class="text-left">{{ ucfirst(Str::limit(@$message->subject, 50)) }}</td>
                                        <td class="text-left">{{ ucfirst(Str::limit(@$message->message, 50)) }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ @$message->replies()->count() }}</span>
                                        </td>
                                        @include("backend.pages.messages.reply-modal", ['id' => $message->id])
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal-{{$message->id}}"
                                                    data-whatever="@fat"
                                                    title="Reply"
                                            >
                                                <i class="fa fa-reply"></i>
                                            </button>
                                            <a href="{{ route('message.replies', @$message->id)  }}"
                                               title="Show Reply Details"
                                               class="btn btn-success btn-sm cus_btn">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                            <a href="{{ route('messages.show', @$message->id)  }}"
                                               title="Show Message Details"
                                               class="btn btn-warning btn-sm cus_btn">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button onclick="deleteRow({{ @$message->id }})"
                                                    href="JavaScript:void(0)"
                                                    title="Delete the message"
                                                    class="btn btn-danger btn-sm cus_btn">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <form id="row-delete-form{{ @$message->id }}" method="POST"
                                                  class="d-none"
                                                  action="{{ route('messages.destroy', @$message->id) }}">
                                                @method('DELETE')
                                                @csrf()
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            @if (count(@$messages))
                                {{ @$messages->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                            @else
                                <div class="text-center">No messages found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.pages.messages.messageMailModal')

@endsection

@push('script')
    <script>

        $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', this.checked);
        });

        $(".checkedMe").click(function () {
            if ($(this).is(":checked")) {
                var isAllChecked = true; // initialize all is checked true

                $(".checkedMe").each(function () {
                    if (!this.checked)
                        isAllChecked = false;
                });

                if (isAllChecked) {
                    $("#checkAll").prop("checked", true);
                }
            } else {
                $("#checkAll").prop("checked", false);
            }
        });


        $(".sendMailAllMessagesBtn").on('click', (e) => {
            e.preventDefault();
            $("#sendMailAllMessagesModal").modal('show');
        })


        $(".sendMailSelectedMessageBtn").on('click', (e) => {
            e.preventDefault();

            let customers = [];
            $(".checkedMe").each(function () {
                if (this.checked) {
                    customers.push($(this).val())
                }
            });

            if (customers.length) {
                $("#selectedMessagesField").val(customers)
                $("#sendMailAllSelectedMessagesModal").modal('show');
            } else {
                toastr.warning('First select some messages.');
            }
        })
    </script>
@endpush
