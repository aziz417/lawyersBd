@extends('backend.layouts.master')
@section('title', 'Subjects')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Subjects</strong>
                </li>
            </ol>

            <a class="btn btn-sm btn-primary pull-right m-t-n-md SubjectCreateModalShow" href="{{ route('subjects.create') }}"><i
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
                        <h5><strong>Subjects</strong></h5>
                    </div>
                    <div class="ibox-content">
                    <div class="row" style="margin-bottom: 10px">

                        <div class="col-sm-12">
                            <form action="" method="get" class="form-inline" role="form">

                                <div class="form-group">
                                    <div>Records Per Page</div>
                                    <select name="perPage" id="perPage" onchange="submit()"
                                            class="input-sm form-control" style="width: 115px;">
                                        <option value="10"{{ request('perPage') == 10 ? ' selected' : '' }}>10
                                        </option>
                                        <option value="25"{{ request('perPage') == 25 ? ' selected' : '' }}>25
                                        </option>
                                        <option value="50"{{ request('perPage') == 50 ? ' selected' : '' }}>50
                                        </option>
                                        <option value="100"{{ request('perPage') == 100 ? ' selected' : '' }}>100
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <br>
                                    <div class="input-group">
                                        <input name="keyword" type="text" value="{{ request('keyword') }}"
                                               class="input-sm form-control" placeholder="Search Here">
                                        <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-primary"> Go!</button>
                                            </span>
                                        <a href="{{ route('sections.index') }}"
                                           class="ml-2 btn btn-outline btn-primary btn-sm"> Reset</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-hover contactDataTable">
                                <thead>
                                <tr>
                                    <th>Si</th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $key => $subject)
                                    <tr>
                                        <td>{{ @$key+1 }}</td>
                                        <td>{{ @$subject->subject_name }}</td>
                                        <td>{{ @$subject->classType->class_name }}</td>
                                        <td>{{ @$subject->section->section_name }}</td>
                                        <td>{{ @$subject->createdUser->name ?? 'N/A' }}</td>
                                        <td>{{ @$subject->updatedUser->name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('subjects.edit', $subject->slug)  }}" title="Edit"
                                               class="btn btn-info cus_btn">
                                                <i class="fa fa-pencil-square-o"></i> <strong>Edit</strong>
                                            </a>
                                            <form style="display: none"
                                                  action="{{ route('subjects.destroy', $subject->slug) }}"
                                                  method="post" id="form-delete-{{ $subject->slug }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button"
                                                    onclick="if (confirm('Are you sure to delete this item ?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('form-delete-{{ $subject->slug }}').submit();
                                                            }else{
                                                            event.preventDefault()
                                                            }" class="btn btn-danger cus_btn">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $subjects->links('backend.component.pagination') }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection