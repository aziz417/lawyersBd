@extends('backend.layouts.master')

@section('title', 'Slider Edit')

@section('content')

    <div class="row wrapper border-bottom white-bg py-3">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('sliders.index') }}">Slider</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Update</strong>
                </li>
            </ol>
            <a class="btn btn-sm btn-primary pull-right m-t-n-md boardCreateModalShow"
               href="{{ route('sliders.index') }}"><i
                    class="fa fa-list"></i> <strong>ALL SLIDER</strong></a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.component.messages')

        <form action="{{ route('sliders.update', @$slider->id) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Edit Slider</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">

                                @include('backend.pages.slider.element')

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <a href="{{ route('sliders.index') }}" class="btn btn-danger" type="submit">Cancel</a>
                                        <button class="btn btn-primary" type="submit">Save Change</button>
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
