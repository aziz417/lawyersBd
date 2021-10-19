@extends('backend.layouts.master')
@section('title', 'Subjects Create')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ back() }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Subjects</strong>
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
                                <form method="post" action="{{ route('subjects.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="class_name">Class</label>
                                                <select class="form-control class_autocomplete" name="class_name" id="class_name">
                                                    <option value="" selected>Choose Class</option>
                                                    @foreach($classNames as $className)
                                                        <option {{ old('class_name') == $className->id ? 'selected' : '' }} value="{{ $className->id }}">{{ $className->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_name')
                                                <small id="class_name" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="section_name">Section</label>
                                                <select class="form-control section_autocomplete" name="section_name" id="section_name">
                                                    <option value="" selected>Choose Section</option>
                                                    @foreach($sections as $section)
                                                        <option {{ old('section_name') == $section->id ? 'selected' : '' }} value="{{ $section->id }}">{{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_name')
                                                <small id="section_name" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subject_name">Subject Name</label>
                                                <input type="text" id="subject_name" name="subject_name"
                                                       value="{{ old('subject_name') }}" class="form-control">
                                                @error('subject_name')
                                                <small id="subject_name" class="text-danger">{{ $message }}</small>
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