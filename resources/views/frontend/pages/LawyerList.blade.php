@extends('frontend.layout.app')
@section('content')
@section('style')
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
@endsection
@include('flashMsg')

<!-- Team -->
<section id="team" class="team">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <h2 class="section-title">Lawyer List</h2>
                </div>
            </div>
        </div>
        @forelse($lawyers->chunk(3) as $lawyerChunk)
            <div class="row">
                @forelse($lawyerChunk as $lawyer)
                    <div class="col-sm-4">
                        <div class="team-box">
                            <img style="height: 230px !important;" class="img-responsive img-full"
                                 src="{{ @$lawyer->image()->where('type', 'profile')->first()->url }}"
                                 alt="team">
                            <div class="team-detail">
                                <input id="average-rate" value="{{ $lawyer->user->rate->average_rate ?? 0 }}"
                                       name="input-2"
                                       class="rating-loading average-rate" data-min="0" data-max="5" data-step="0.1">
                                <ul class="mb-5">
                                    <li><h3>{{ $lawyer->applicants_name }}</h3></li>
                                    <li><h4 class="font-weight-bold">{{ ucfirst(@$lawyer->category->title) }} <span
                                                    class="text-danger font-weight-bold">{{ ucfirst(@$lawyer->category->position) }}</span>
                                        </h4></li>
                                    <li><h4 class="font-weight-bold"> Contact: {{ $lawyer->mobile_number }}</h4><a
                                                class="btn btn-success pull-left"
                                                href="{{ url('/') }}/#EmailContactForm"
                                                onclick="mailForm({{ $lawyer }})">Mail</a><a
                                                class="btn btn-primary pull-right">Message</a></li>
                                    <li><a href="{{ route('lawyer.details', $lawyer->id) }}">Details</a></li>
                                </ul>
                                <button class="btn btn-success w-full" onclick="hireNow({{ @$lawyer->user->id }})"
                                        style="width: 100%">Hire Now
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Lawyer Not Found</p>
                @endforelse
            </div>
            @empty
        @endforelse
    </div>
    @include('frontend.components.hire-now-modal', $types = $caseTypes)
</section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        function hireNow(id) {
            $("#lawyer_id").val(id);
            $("#exampleModalCenter").modal('show');
        }

        function fromSubmit() {
            $('#caseSubmit').submit();
        }

        $(document).ready(function () {
            $('.average-rate').rating({displayOnly: true});
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
