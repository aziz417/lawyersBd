@extends('backend.layouts.master')
@section('title', 'Setting')

@section('content')
    <div class="row wrapper border-bottom white-bg py-3">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('settings.index') }}">Site Settings</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Create</strong>
                </li>
            </ol>
            <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"
               href="{{ route('settings.index') }}"><i
                    class="fa fa-list"></i> <strong>ALL SITE SETTING </strong></a>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')

        <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Create a new Setting for your company</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                @include('backend.pages.settings.element')
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-danger" type="submit">Chancel</a>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('script')

@endpush
