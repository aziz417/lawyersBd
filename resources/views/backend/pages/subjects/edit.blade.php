@extends('backend.layouts.master')
@section('title', 'Subject Edit')

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
                <li class="breadcrumb-item active">
                    <strong>Edit</strong>
                </li>
            </ol>
            <a href="javascript:history.back()"
               class="btn btn-sm btn-primary pull-right m-t-n-md subjectCreateModalShow"><strong>Back</strong></a>
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
                                <form method="post" action="{{ route('subjects.update', $subject->slug) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="question">Subject Name</label>
                                                <input type="text" id="subject_name" name="subject_name"
                                                       value="{{ $subject->subject_name }}" class="form-control">
                                                @error('subject_name')
                                                <small id="question_feedback" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="class_name">Class</label>
                                                <select class="form-control class_autocomplete" name="class_name" id="class_name">
                                                    <option value="" selected>Choose Class</option>
                                                    @foreach($classNames as $className)
                                                        <option {{ $subject->class_id == $className->id ? 'selected' : '' }} value="{{ $className->id }}">{{ $className->class_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_name')
                                                <small id="class_name" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="section_name">Section Name</label>
                                                <select class="form-control" name="section_name" id="section_name">
                                                    <option value="" selected>Choose Section</option>
                                                    @foreach($sections as $section)
                                                        <option {{ $subject->section_id == $section->id ? 'selected' : '' }} value="{{ $section->id }}">{{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_name')
                                                <small id="section_name" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ModalSubmit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection