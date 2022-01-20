@extends('frontend.layout.app')
@section('style')
    <style type="text/css">
        .error {
            color: red;
        }

        .hireNowModal input {
            border: 2px solid #dddddd;
        }

        .hireNowModal select {
            border: 2px solid #dddddd;
        }

        .hireNowModal textarea {
            border: 2px solid #dddddd;
        }

    </style>
@endsection
@section('content')

    {{--    message--}}
    @include('flashMsg')

    <!-- Consultation -->
    <section style="margin-top: 55px !important;" id="consultation" class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title">{{ Auth::user()->role == 'lawyer' ? 'New' : 'Your' }} Cases</h2>
                    </div>
                </div>
            </div>
            @if(Auth::user()->role == 'user')
                @forelse($cases->chunk(3) as $chunkCases)

                    <div class="row">
                        @forelse($chunkCases as $case)
                            <div class="col-sm-4">
                                <div class="team-box">
                                    <div class="team-detail">
                                        <h3 style="margin-top: 0" class="mt-0">
                                            <strong>Title:</strong> {{ ucfirst(Str::limit($case->title, 50)) }}</h3>
                                        <h4 class="font-weight-bold">
                                            <strong>Description:</strong> {{ ucfirst(Str::limit($case->description, 50)) }}
                                        </h4>
                                        <a class="btn btn-primary"
                                           href="{{ route('applied.case.details', $case->id) }}">Details</a> <span class="btn btn-success text-white">Applied: {{ $case->submittedLawyers()->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Case Not Found</p>
                @endforelse
            @endif

            @if(Auth::user()->role == 'lawyer')
                @forelse($newCases->chunk(3) as $chunkCases)
                    <div class="row">
                        @forelse($chunkCases as $case)
                            <div class="col-sm-4">
                                <div class="team-box">
                                    <div class="team-detail">
                                        <h3 style="margin-top: 0" class="mt-0">
                                            <strong>Title:</strong> {{ ucfirst(Str::limit($case->title, 50)) }}</h3>
                                        <h4 class="font-weight-bold">
                                            <strong>Description:</strong> {{ ucfirst(Str::limit($case->description, 50)) }}
                                        </h4>
                                        <a class="btn btn-primary"
                                           href="{{ route('applied.case.details', $case->id) }}">Details</a>
                                        <a href="{{ route('case.apply', $case->id) }}" class="btn btn-success">Apply</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Case Not Found</p>
                @endforelse


                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box">
                            <h2 class="section-title">Your Submitted Cases</h2>
                        </div>
                    </div>
                </div>

                @forelse($submittedCases->chunk(3) as $chunkCases)
                    <div class="row">
                        @forelse($chunkCases as $case)

                            <div class="col-sm-4">
                                <div class="team-box">
                                    <div class="team-detail">
                                        <h3 style="margin-top: 0" class="mt-0">
                                            <strong>Title:</strong> {{ ucfirst(Str::limit($case->title, 50)) }}</h3>
                                        <h4 class="font-weight-bold">
                                            <strong>Description:</strong> {{ ucfirst(Str::limit($case->description, 50)) }}
                                        </h4>
                                        <a class="btn btn-primary"
                                           href="{{ route('applied.case.details', $case->id) }}">Details</a>
                                        <button class="btn btn-success">Applied</button>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Case Not Found</p>
                @endforelse
            @endif
        </div>
        @if(Auth::check())
        @if(Auth::user()->role == 'user')
        <div class="container">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 25px" id="exampleModalLongTitle">Submit Your Case</h5>
                </div>
                <div class="modal-body p-6">
                    <form class="hireNowModal" id="caseSubmit" enctype="multipart/form-data" method="post"
                          action="{{ route('case.store') }}">
                        @csrf

                        <input name="submitted_case" value="submitted" type="hidden">
                        <input name="lawyer_id" value="0" type="hidden">
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" required
                                   placeholder="Title">
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
                            <textarea name="description" type="text" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="documentation">Documentation</label>
                            <input name="documentation" type="file" class="form-control" id="documentation"
                                   placeholder="1234 Main St">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="caseSubmit" onclick="fromSubmit()">Case Submit
                    </button>
                </div>
            </div>
        </div>
        @endif
        @endif
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        function fromSubmit() {
            $('#caseSubmit').submit();
        }

        $(document).ready(function () {
            $('#caseSubmit').validate({ // initialize the plugin
                rules: {
                    title: {
                        required: true
                    },
                    caseTypeId: {
                        required: true,
                    },
                    caseDate: {
                        required: true,
                    },
                    coteDate: {
                        required: true,
                    },
                }

            });

        });
    </script>
@endsection
