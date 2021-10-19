@extends('backend.layouts.master')
@section('title', 'Section Edit')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Section</strong>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Edit</strong>
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
                                <form method="post" action="{{ route('sections.update', $section->slug) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="class_type">Class Name</label>
                                                <select class="form-control" name="class_type" id="class_type">
                                                    <option value="" selected>Choose Class</option>
                                                    @foreach($classes as $class)
                                                        <option {{ $section->class_type_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_type')
                                                <small id="class_type" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="section_name">Section Name</label>
                                                <input type="text" id="section_name" name="section_name"
                                                       value="{{ $section->section_name }}" class="form-control">
                                                @error('section_name')
                                                <small id="section_name" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection