@extends('backend.layouts.master')
@section('title', 'Categories')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Categories</strong>
                </li>
            </ol>
            <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"
               href="{{ route('categories.create') }}"><i
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
                        <h5><strong>Categories</strong></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" title="Edit">
                                                <div class="btn btn-info cus_btn">
                                                    <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                                </div>
                                            </a>
                                            <form style="display: none"
                                                  action="{{ route('categories.destroy', $category->id) }}"
                                                  method="post" id="form-delete-{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button"
                                                    onclick="if (confirm('Are you sure to delete this item ?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('form-delete-{{ $category->id }}').submit();
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
                            {{ $categories->links('backend.component.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

