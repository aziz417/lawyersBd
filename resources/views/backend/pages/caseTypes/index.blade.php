@extends('backend.layouts.master')
@section('title', 'Case Types')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Case Types</strong>
                </li>
            </ol>
            <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"
               href="{{ route('caseTypes.create') }}"><i
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
                        <h5><strong>Case Type</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Case Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($caseTypes as $key => $caseType)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $caseType->title }}</td>
                                        <td>
                                            <a href="{{ route('caseTypes.edit', $caseType->id) }}" title="Edit">
                                                <div class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                                </div>
                                            </a>
                                            <form style="display: none"
                                                  action="{{ route('caseTypes.destroy', $caseType->id) }}"
                                                  method="post" id="form-delete-{{ $caseType->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button"
                                                    onclick="if (confirm('Are you sure to delete this item ?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('form-delete-{{ $caseType->id }}').submit();
                                                            }else{
                                                            event.preventDefault()
                                                            }" class="btn btn-danger cus_btn">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-center text-danger">No data</p>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $caseTypes->links('backend.component.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

