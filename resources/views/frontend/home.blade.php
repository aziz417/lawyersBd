@extends('frontend.layout.app')
@section('content')
<style>
    h4{font-size: 16px !important;}
</style>

    <div class="col-sm-2" style="background: #ccc;">
        <div class="row" style="margin-top: 50px">
            <h4 style="color: #000" class="text-center"><strong>Top Three Senior Lawyers</strong></h4>
            @forelse($top_3_senior_lawyers as $topSeniorKey => $lawyer)
                <div class="col-sm-12">
                    <div class="team-box" style="margin-bottom: 0">
                        <div class="team-detail" style="padding: 0!important;">
                            <div style="padding: 5px 10px 35px 10px;;">
                                <h5 style="margin-bottom: 0">
                                    <span class="mr-5" style="float: left"><strong>{{ Str::limit($lawyer->applicants_name, 10) }}</strong></span>
                                    <a style="float: right" href="{{ route('lawyer.details', $lawyer->id) }}">Details</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @if($loop->index >= 2)
                    @break
                @endif
            @empty
                <p class="text-capitalize text-center text-3xl justify-center">Lawyer Not Found</p>
            @endforelse
        </div>

        <div class="row" style="margin-top: 10px">
            <h4 style="color: #000" class="text-center"><strong>Top Two Lawyers</strong></h4>
            @forelse($top_3_lawyers as $topThreeKey => $lawyer)
                <div class="col-sm-12">
                    <div class="team-box" style="margin-bottom: 0">
                        <div class="team-detail" style="padding: 0!important;">
                            <div style="padding: 5px 10px 35px 10px;;">
                                <h5 style="margin-bottom: 0">
                                    <span class="mr-5" style="float: left"><strong>{{ Str::limit($lawyer->applicants_name, 10) }}</strong></span>
                                    <a style="float: right" href="{{ route('lawyer.details', $lawyer->id) }}">Details</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-capitalize text-center text-3xl justify-center">Lawyer Not Found</p>
            @endforelse
        </div>
    </div>
    <div class="col-sm-8">
        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
            <!-- Overlay -->
            <div class="overlay"></div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @forelse($sliders as $key => $slider)
                    <li data-target="#bs-carousel" data-slide-to="{{$key}}"
                        class="{{ $key === 0 ? 'active' : '' }}"></li>
                @empty
                    <p class="text-center">No slider</p>
                @endforelse
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @forelse($sliders as $key => $slider)
                    <div style="height: 410px" class="item slides {{ $key === 0 ? 'active' : '' }}">
                        <div class="slide-{{ $key++ }}">
                            <img style="width: 100%; height: 410px !important;" class="img-responsive1"
                                 src="{{ $slider->image->url }}"
                                 alt="testimonial">
                        </div>
                    </div>
                @empty
                    <p class="text-center">No slider</p>
                @endforelse
            </div>
        </div>

        <div class="row" >
            <div class="col-sm-12"  style="margin-top: 10px">
                <div class="title-box">
                    <h3 class="section-title">Senior Lawyers</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2" style="background: #ccc; margin-top: 50px">
        <h4 style="color: #000; margin-top: 7px" class="text-center"><strong>Register Now</strong></h4>
        <div class="team-box" style="margin-bottom: 0">
            <div class="team-detail" style="padding: 10px!important;">
                <div>
                    <h4 style="margin: 0; text-align: center">
                        You can create a account for <br> <a href="{{ route('registration', 'user') }}">User</a> and for <a href="{{ route('registration', 'lawyer') }}">Lawyer</a>
                    </h4>
                </div>
            </div>
        </div>

        <h4 style="color: #000; margin-top: 7px" class="text-center"><strong>Case Create</strong></h4>
        <div class="team-box" style="margin-bottom: 0">
            <div class="team-detail" style="padding: 10px!important;">
                <div>
                    <h4 style="margin: 0; text-align: center">
                        Create here your case<a style="font-size: 16px" href="{{ route('case.create') }}">Case Create</a>
                    </h4>
                </div>
            </div>
        </div>

        <h4 style="color: #000; margin-top: 7px" class="text-center"><strong>Our Lawyers And Users</strong></h4>
        <div class="team-box" style="margin-bottom: 0">
            <div class="team-detail" style="padding: 10px!important;">
                <div>
                    <h4 style="margin: 0; text-align: center">
                        Lawyers: {{ $totalLayers ?? 0  }} || Users: {{ $totalUsers ?? 0  }}
                    </h4>
                </div>
            </div>
        </div>

        <h4 style="color: #000; margin-top: 7px" class="text-center"><strong>Cases</strong></h4>
        <div class="team-box" style="margin-bottom: 0">
            <div class="team-detail" style="padding: 10px!important;">
                <div>
                    <h4 style="margin: 0; text-align: center">
                        Cases: {{ $totalCases->count()  }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    @include('flashMsg')

    {{--    <div id="test-slider1" class="owl-carousel owl-carousel-custom-design">--}}
    {{--        @forelse($sliders as $slider)--}}
    {{--            <div class="item1">--}}
    {{--                <img style="width: 100%; height: 660px !important;" class="img-responsive1"--}}
    {{--                     src="{{ $slider->image->url }}"--}}
    {{--                     alt="testimonial">--}}
    {{--            </div>--}}
    {{--        @empty--}}
    {{--            <p class="text-center">No slider</p>--}}
    {{--        @endforelse--}}
    {{--    </div>--}}
    <section id="team" class="team mt-5">
        <div class="container">
            <div class="row">
                @forelse($senior_lawyers as $key => $lawyer)
                    <div class="col-sm-3">
                        <div class="team-box">
                            <img style="height: 180px !important;" class="img-responsive img-full"
                                 src="{{ @$lawyer->image()->where('type', 'profile')->first()->url }}"
                                 alt="team">
                            <div class="team-detail">
                                <ul class="mb-5">
                                    <li><h3>{{ $lawyer->applicants_name }}</h3></li>
                                    <li><a
                                                class="btn btn-success pull-left"
                                                href="{{ url('/') }}/#EmailContactForm"
                                                onclick="mailForm({{ $lawyer }})">Mail</a><a
                                                class="btn btn-primary pull-right"
                                                href="{{ url('chatify/'.$lawyer->id) }}">Message</a></li>
                                    <li><h4><a href="{{ route('lawyer.details', $lawyer->id) }}">Details</a></h4></li>
                                </ul>
                                <button class="btn btn-success w-full mt-6" onclick="hireNow({{ @$lawyer->user->id }})"
                                        style="width: 100%">Hire Now
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-capitalize text-center text-3xl justify-center">Lawyer Not Found</p>
                @endforelse
            </div>
        </div>
        @include('frontend.components.hire-now-modal', $types = $caseTypes)
    </section>

    <!-- Practice areas -->
    <section id="practice" class="practice">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title">Top 10 Lawyers</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($top_10_lawyers as $lawyer)
                    <div class="col-sm-6 col-md-3">
                        <a href="{{ route('lawyer.details', $lawyer->id) }}">
                            <div class="practice-box">
                                <img class="img-responsive img-full"
                                     src="{{ $lawyer->image()->where('type', 'profile')->first() ? $lawyer->image()->where('type', 'profile')->first()->url : '' }}">
                                <div class="overlay">
                                    <div class="c-table">
                                        <div class="ct-cell">
                                            <input id="average-rate" value="{{ $lawyer->rate->average_rate ?? '' }}"
                                                   name="input-2" class="rating-loading average-rate" data-min="0"
                                                   data-max="5"
                                                   data-step="0.1">
                                            <h3 class="practice-title">{{ $lawyer->applicants_name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-center">No Layers</p>
                @endforelse
            </div>
            <a style="float: right;" class="float-right btn btn-success" href="{{ route('lawyer.list') }}">More</a>
        </div>
    </section>
    <!-- Testimonial -->
    <section id="testimonial" class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title">Top Three Lawyers And Their About</h2>
                    </div>

                    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000"
                         id="bs-carousel">
                        <!-- Overlay -->
                        <div class="overlay"></div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @forelse($top_10_lawyers as $key => $lawyer)
                                <li data-target="#bs-carousel" data-slide-to="{{$key}}"
                                    class="{{ $key === 0 ? 'active' : '' }}"></li>
                            @empty
                            @endforelse
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @forelse($top_10_lawyers as $key => $lawyer)
                                @if ($key > 2)
                                    @break
                                @endif
                                <div class="item slides {{ $key === 0 ? 'active' : '' }}">
                                    <div class="slide-{{ $key++ }}">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img class="img-responsive img-full"
                                                     src="{{ $lawyer->image()->where('type', 'profile')->first() ?
                                                                 $lawyer->image()->where('type', 'profile')->first()->url : '' }}"
                                                     alt="testimonial">
                                            </div>
                                            <div class="col-sm-7">
                                                <p>
                                                    {{ $lawyer->about_say_you }}
                                                </p>
                                                <a style="display: block; color: white; float: right"
                                                   href="{{ route('lawyer.details', $lawyer->id) }}">More</a>
                                                <span>{{ $lawyer->applicants_name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No slider</p>
                            @endforelse
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title"><span id="contactTitle" class="text-success">Admin</span> With Contact
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <form id="EmailContactForm" action="{{ route('messages.store') }}" method="post">
                        @csrf
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-person"></i>
                                    </span>
                            <input class="form-control" type="text" placeholder="Name" name="name" required>
                        </div>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-email"></i>
                                    </span>
                            <input class="form-control" id="lawyerEmail" name="email" type="email"
                                   placeholder="Email address" required>
                        </div>
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ion-email"></i>
                                    </span>
                            <input class="form-control" name="subject" type="text" placeholder="Subject" required>
                        </div>
                        <div class="input-group">
                                    <span class="input-group-addon custom-addon">
                                        <i class="ion-chatbubbles"></i>
                                    </span>
                            <textarea class="form-control" rows="8" placeholder="Write Message"
                                      name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default btn-block">Send your Message <span
                                    class="ion-paper-airplane"></span></button>
                    </form>

                </div>
            </div>
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
    <script>
        $(document).ready(function () {
            $('.average-rate').rating({displayOnly: true});
        });
    </script>

@endsection

