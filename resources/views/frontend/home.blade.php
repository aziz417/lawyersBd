@extends('frontend.layout.app')
@section('content')

    <div id="test-slider1" class="owl-carousel owl-carousel-custom-design">
        @forelse($sliders as $slider)
            <div class="item1">
                <img style="width: 100%; height: 660px !important;" class="img-responsive1"
                     src="{{ $slider->image->url }}"
                     alt="testimonial">
            </div>
        @empty
            <p class="text-center">No slider</p>
        @endforelse
    </div>

    <section id="team" class="team">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title">Senior Lawyers</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($senior_lawyers as $key => $lawyer)
                    <div class="col-sm-4">
                        <div class="team-box">
                            <img style="height: 230px !important;" class="img-responsive img-full"
                                 src="{{ @$lawyer->image()->where('type', 'profile')->first()->url }}"
                                 alt="team">
                            <div class="team-detail">
                                <ul class="mb-5">
                                    <li><h3>{{ $lawyer->applicants_name }}</h3></li>
                                    <li><h4 class="font-weight-bold">{{ ucfirst(@$lawyer->category->title) }} <span
                                                    class="text-danger font-weight-bold">{{ ucfirst(@$lawyer->category->position) }}</span>
                                        </h4></li>
                                    <li><h4 class="font-weight-bold"> Contact: {{ $lawyer->mobile_number }} </h4><a
                                                class="btn btn-success pull-left" href="{{ url('/') }}/#EmailContactForm" onclick="mailForm({{ $lawyer }})">Mail</a><a
                                                class="btn btn-primary pull-right" href="{{ url('chatify/'.$lawyer->id) }}">Message</a></li>
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
                    <div class="col-sm-6 col-md-4">
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

                    <div id="test-slider" class="owl-carousel">
                        @forelse($top_10_lawyers as $key => $lawyer)
                            @if ($key > 2)
                                @break
                            @endif
                            <div class="item">
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
                        @empty
                            <p class="text-center">No Layers</p>
                        @endforelse
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
                        <h2 class="section-title"><span id="contactTitle" class="text-success">Admin</span> With Contact</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('frontend') }}/assets/images/logo.png" alt="logo" class="contact-logo">
                    <p>
                        This is Texas Lawyers, an awesome template for Lawyers. It provides everything and more for a
                        lower. Search no more, Download this now.This is Texas Lawyers, an awesome template for Lawyers.
                    </p>
                    <ul>
                        <li><span class="ion-location"></span>322, Adress, Lorem Ipsum Avenue, London, Earth</li>
                        <li><span class="ion-android-call"></span>(888) 123-456-7890</li>
                        <li><span class="ion-paper-airplane"></span>thisisfakeemail@noreply.com</li>
                    </ul>
                </div>
                <div class="col-sm-6">
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
                            <input class="form-control" id="lawyerEmail" name="email" type="email" placeholder="Email address" required>
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
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.average-rate').rating({displayOnly: true});
        });
    </script>
@endsection
