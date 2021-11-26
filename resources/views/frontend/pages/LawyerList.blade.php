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
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-1.jpg"
                             alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Jewel Jahan</h3></li>
                                <li><h4>Counsel</h4></li>
                                <li>Family Law</li>
                                <li>Commercial Lending,</li>
                                <li><a href="{{ route('lawyer.details') }}">Details</a></li>
                            </ul>
                            <button class="btn btn-success w-full" style="width: 100%">Hire Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-2.jpg"
                             alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Rub Elvi</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Personal Injury</li>
                                <li>Medical Malpractice,</li>
                                <li>Real Estate</li>
                            </ul>
                            <button class="btn btn-success w-full" style="width: 100%">Hire Now</button>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-3.jpg"
                             alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>K. Survy</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Vehicle accident</li>
                                <li>Commercial Lending,</li>
                                <li>Personal Injury</li>
                            </ul>
                            <button class="btn btn-success w-full" style="width: 100%">Hire Now</button>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-1.jpg"
                             alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Jewel Jahan</h3></li>
                                <li><h4>Counsel</h4></li>
                                <li>Family Law</li>
                                <li>Commercial Lending,</li>
                                <li>Real Estate</li>
                            </ul>
                            <button class="btn btn-success w-full" style="width: 100%">Hire Now</button>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-2.jpg"
                             alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Rub Elvi</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Personal Injury</li>
                                <li>Medical Malpractice,</li>
                                <li>Real Estate</li>
                            </ul>
                            <button class="btn btn-success w-full" style="width: 100%">Hire Now</button>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-3.jpg"
                             alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>K. Survy</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Vehicle accident</li>
                                <li>Commercial Lending,</li>
                                <li>Personal Injury</li>
                            </ul>
                            <button class="btn btn-success w-full" onclick="hireNow({{ '1' }})" style="width: 100%">Hire Now</button>
                            <!-- Button trigger modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.components.hire-now-modal')
    </section>
@endsection
@section('script')
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
