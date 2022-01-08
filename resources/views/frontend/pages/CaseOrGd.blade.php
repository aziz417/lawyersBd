@extends('frontend.layout.app')
@section('content')
{{--    message--}}
    @include('flashMsg')


    <!-- Consultation -->
    <section id="consultation" class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title">Case List</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($cases as $case)
                    <div class="col-sm-4">
                        <div class="team-box">
                            <div class="team-detail">
                                <h3 style="margin-top: 0" class="mt-0"><strong>Title:</strong> {{ $case->title }}</h3>
                                <h4 class="font-weight-bold"><strong>Description:</strong> {{ ucfirst(@$case->description) }}</h4>
                                <a href="{{ route('case.details', $case->id) }}">Details</a>
                                <button class="btn btn-success w-full" onclick="hireNow({{ @$case->user->id }})" style="width: 100%">Applied</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Case Not Found</p>
                @endforelse
            </div>
        </div>
        <div class="container">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 25px" id="exampleModalLongTitle">Submit Your Case</h5>
                </div>
                <div class="modal-body p-6">
                    <form class="hireNowModal" id="caseSubmit" enctype="multipart/form-data" method="post" action="{{ route('case.store') }}">
                        @csrf

                        <input name="case_id" type="hidden" id="case_id">
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" required placeholder="Money Loss">
                        </div>
                        <div class="form-group">
                            <label for="caseType">Case Type<span class="text-danger">*</span></label>
                            <select id="caseType" class="form-control" name="caseTypeId">
                                <option selected>Choose...</option>
                                @foreach($caseTypes as $type)
                                    <option value="{{ $type->id }}"> {{ ucwords($type->title) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" style="padding-left: 0 !important;">
                                <label for="caseDate">Case Date<span class="text-danger">*</span></label>
                                <input name="caseDate" type="text" class="form-control" id="caseDate">
                            </div>
                            <div class="form-group col-md-6" style="padding-right: 0 !important;">
                                <label for="coteDate">Cote Date<span class="text-danger">*</span></label>
                                <input name="coteDate" type="text" class="form-control" id="coteDate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" type="text" class="form-control" id="description" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="documentation">Documentation</label>
                            <input name="documentation" type="file" class="form-control" id="documentation" placeholder="1234 Main St">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="caseSubmit" onclick="fromSubmit()">Case Submit</button>
                </div>
            </div>
        </div>
    </section>
@endsection
