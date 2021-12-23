@extends('backend.layouts.master')
@section('title', 'caseType Create')

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
                <li class="breadcrumb-item active">
                    <strong>Create</strong>
                </li>
            </ol>
            <a href="javascript:history.back()"
               class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"><strong>Back</strong></a>
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
                                <form method="post" action="{{ route('caseTypes.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="caseType">Case Type</label>
                                                <input type="text" id="caseType" name="caseType"
                                                       value="{{ old('caseType') }}" class="form-control">
                                                @error('caseType')
                                                <small id="caseType" class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ModalSubmit">Store</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
