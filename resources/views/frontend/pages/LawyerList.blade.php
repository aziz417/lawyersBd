@extends('frontend.layout.app')
@section('content')
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
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-1.jpg" alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Jewel Jahan</h3></li>
                                <li><h4>Counsel</h4></li>
                                <li>Family Law</li>
                                <li>Commercial Lending,</li>
                                <li><a href="{{ route('lawyer.details') }}">Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-2.jpg" alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Rub Elvi</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Personal Injury</li>
                                <li>Medical Malpractice,</li>
                                <li>Real Estate</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-3.jpg" alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>K. Survy</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Vehicle accident</li>
                                <li>Commercial Lending,</li>
                                <li>Personal Injury</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-1.jpg" alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Jewel Jahan</h3></li>
                                <li><h4>Counsel</h4></li>
                                <li>Family Law</li>
                                <li>Commercial Lending,</li>
                                <li>Real Estate</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-2.jpg" alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>Rub Elvi</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Personal Injury</li>
                                <li>Medical Malpractice,</li>
                                <li>Real Estate</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/team-3.jpg" alt="team">
                        <div class="team-detail">
                            <ul>
                                <li><h3>K. Survy</h3></li>
                                <li><h4>Member</h4></li>
                                <li>Vehicle accident</li>
                                <li>Commercial Lending,</li>
                                <li>Personal Injury</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
