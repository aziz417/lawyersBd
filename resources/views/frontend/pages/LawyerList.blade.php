@extends('frontend.layout.app')
@section('content')
    @section('style')
        <style type="text/css">
            .error{
                color: red;
            }

        </style>
    @endsection
    <!-- Team -->
    <section id="team" class="team">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <p class="section-subtitle">You may want to</p>
                        <h2 class="section-title">Know the attorneys</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($lawyers as $lawyer)
                    <div class="col-sm-4">
                        <div class="team-box">
                            <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-1.jpg"
                                 alt="team">
                            <div class="team-detail">
                                <input id="input-2" value="3.4" name="input-2" class="rating rating-loading disabled" data-min="0" data-max="5" data-step="0.1">
{{--                                {{ dd($lawyer) }}--}}
                                <ul>
                                    <li><h3>{{ $lawyer->applicants_name }}</h3></li>
                                    <li><h4>{{ $lawyer->applicants_name }}</h4></li>
                                    <li><a href="{{ route('lawyer.details') }}">Details</a></li>
                                </ul>
                                <button class="btn btn-success w-full" onclick="hireNow({{ '1' }})" style="width: 100%">Hire Now</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Lawyer Not Found</p>
                @endforelse
            </div>
        </div>
        @include('frontend.components.hire-now-modal')
    </section>
@endsection
@section('script')
    <script>
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        function hireNow(id){
            $("#lawyer_id").val(id);
            $("#exampleModalCenter").modal('show');
        }

        function fromSubmit(){
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
