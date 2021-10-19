@extends('backend.layouts.master')
@section('title', 'Institutes Create')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Institutes</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Create</strong>
                </li>
            </ol>
            <a href="javascript:history.back()"
               class="btn btn-sm btn-primary pull-right m-t-n-md"><strong>Back</strong></a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="post" action="{{ route('institutes.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="class_type">Class Name</label>
                                                <select class="form-control class_autocomplete" name="class_type" id="class_type">
                                                    <option value="" selected>Choose Class</option>
                                                    @foreach($classes as $class)
                                                        <option {{ old('class_type') == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_type')
                                                <small id="class_type" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="institute_name">Institute Name</label>
                                                <input type="text" id="institute_name" name="institute_name"
                                                       value="{{ old('institute_name') }}" class="form-control">
                                                @error('institute_name')
                                                <small id="institute_name" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Store</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>

    </script>
@endpush