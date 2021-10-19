@extends('backend.layouts.master')
@section('title', 'Boards')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Boards</strong>
                </li>
            </ol>
            <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow" href="{{ route('boards.create') }}"><i
                        class="fa fa-plus"></i> <strong>Create
                    New</strong></a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><strong>Boards</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>Si</th>
                                    <th>Board</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($boards as $key => $board)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $board->board_name }}</td>
                                        <td>{{ $board->createdUser->name ?? 'N/A' }}</td>
                                        <td>{{ $board->updatedUser->name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('boards.edit', $board->slug)  }}" title="Edit"
                                               class="btn btn-info cus_btn">
                                                <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                            </a>
                                            <form style="display: none"
                                                  action="{{ route('boards.destroy', $board->slug) }}"
                                                  method="post" id="form-delete-{{ $board->slug }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button"
                                                    onclick="if (confirm('Are you sure to delete this item ?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('form-delete-{{ $board->slug }}').submit();
                                                            }else{
                                                            event.preventDefault()
                                                            }" class="btn btn-danger cus_btn">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $boards->links('backend.component.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection