@extends('frontend.layout.app')
@section('content')
    @include('flashMsg')
    <!-- Fun Facts -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 my-5 pt-5">
                    <div class="title-box">
                        <h2 class="section-title">My Circumstance</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="fun-box">
                        <p class="fun-number">{{ $position['fight'] }}</p>
                        <p class="fun-title">Cases were fight</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="fun-box">
                        <p class="fun-number">{{ $position['success'] }}</p>
                        <p class="fun-title">Cases have been won</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="fun-box">
                        <p class="fun-number">{{ $position['progress'] }} Cases</p>
                        <p class="fun-title">In-Progress</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="fun-box">
                        <p class="fun-number">{{ $position['new'] }} Cases</p>
                        <p class="fun-title">New</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Slider 1 -->

    <section id="slider-1" class="slider-1 overlay-light">
        <div class="container">
            <div class="row">
                <div class="title-box">
                    <h2 class="section-title">nearest win cases</h2>
                </div>
                @if($win_case)
                    <div class="col-sm-12">
                        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000"
                             id="bs-carousel">
                            <!-- Overlay -->
                            <div class="overlay"></div>
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @forelse($win_cases as $key => $case)
                                    <li data-target="#bs-carousel" data-slide-to="{{$key}}"
                                        class="{{ $key === 0 ? 'active' : '' }}"></li>
                                @empty
                                    <p class="text-center">No slider</p>
                                @endforelse
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @forelse($win_cases as $key => $case)
                                    <div class="item slides {{ $key === 0 ? 'active' : '' }}">
                                        <div class="slide-{{ $key++ }}">
                                            <div class="slider-1-item-box" style="color: #0f0e0f">
                                                <h2>{{ $case->title }}</h2>
                                                <p style="font-size: 25px">
                                                    {{ Str::limit($case->description, 300) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center">No Data</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Clients -->
    <section id="clients" class="clients">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h2 class="section-title">Satisfied 5 clients</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($satisfied_5_clients as $client)
                    <div class="col-sm-offset-1 col-sm-2">
                        <div class="client-box">
                            <a href="#">
                                <img class="img-responsive img-full"
                                     src="{{ isset($client->user->register->image()->where('type', 'profile')->first()->url) ? $client->user->register->image()->where('type', 'profile')->first()->url : '' }}" alt="user image">
                            </a>
                        </div>
                    </div>
                @empty
                    <h5 class="text-center">No Satisfied clients</h5>
                @endforelse
            </div>

            <div class="container" style="margin-top: 50px">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-5">
                                @if($successCase)
                                    <div class="my-5">
                                        <h2>{{ isset($lawyer->user->rate->clint_rate) && $lawyer->user->rate->clint_rate ? 'Update' : 'Submit' }}
                                            Your Rate:</h2>
                                        <form action="{{ route('submit.rate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="lawyer_id" value="{{ $lawyer->user_id }}">

                                            <input id="input-9" name="client_rate"
                                                   value="{{ $thisLawyerThisUserRate ?? 0 }}"
                                                   required class="rating-loading">
                                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>&nbsp;
                                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <h3 class="section-title text-center"><span
                                            class="text-danger">{{ $lawyer->applicants_name }}</span> Rating Panel</h3>
                            </div>

                            <div class="col-sm-3">
                                <div class="p-4">
                                    <h3>Average Rate:</h3>
                                    <input id="average-rate" value="{{ $lawyer->user->rate->average_rate ?? 0 }}"
                                           class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="p-4">
                                    <h3>Client Rate:</h3>
                                    <input id="client-rate" value="{{ $lawyer->user->rate->clint_rate ?? 0 }}"
                                           class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="p-4">
                                    <h3>Case Rate:</h3>
                                    <input id="case-rate" value="{{ $lawyer->user->rate->case_rate ?? 0 }}"
                                           class="rating-loading"
                                           data-min="0" data-max="5" data-step="0.1">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="p-4">
                                    <h3>Education Rate:</h3>
                                    <input id="education-rate" value="{{ $lawyer->user->rate->education_rate ?? 0 }}"
                                           class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">

                        <div class="row">
                            <h4 style="color: #000" class="text-center"><strong>Reviews</strong></h4>
                            <div class="submit_your_review mb-5" >
                                <form action="{{ route('reviews.store') }}" method="post">
                                    @csrf
                                    <input name="lawyer_id" type="hidden" value="{{ $lawyer->id }}">
                                    <textarea style="border: 1px solid #CCCCCC" name="title" class="form-control" placeholder="Write your opinion"></textarea>
                                    <button class="mt-2 float-right" type="submit">Send</button>
                                </form>
                            </div>

                            <div style="height: 300px; overflow-y: scroll" class="review-section">
                                @forelse($reviews as $review)
                                    @php
                                        $user = App\Registration::with('image')->where('user_id', $review->user_id)->first();
                                    @endphp
                                <div class="col-sm-12">
                                    <div class="team-box" style="margin-bottom: 0">
                                        <div class="team-detail" style="padding: 0!important;">
                                            <div style="padding: 10px;">
                                                <img style="width: 30px; height: 30px; border-radius: 100%"
                                                     src="{{ $user->image()->where('type', 'profile')->first()->url ?? '' }}">
                                                <span class="mr-5"
                                                ><strong>{{ Str::limit($user->applicants_name, 14) }}</strong></span>
                                                <p class="mt-3">{{ @$review->title }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <p>No Reviews</p>
                                @endforelse
                            </div>
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
                        <h2 class="section-title"><span class="text-success">{{ $lawyer->applicants_name }}</span> With
                            Contact</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ $lawyer->image()->where('type', 'profile')->first()->url ?? '' }}" alt="logo"
                         class="contact-logo">
                    <ul>
                        <li>
                            <span class="ion-location"></span>{{ $lawyer->present_village.', '.$lawyer->present_upazila.', '.$lawyer->present_district }}
                        </li>
                        <li><span class="ion-android-call"></span>{{ $lawyer->mobile_number }}</li>
                        <li><span class="ion-paper-airplane"></span>{{ $lawyer->email }}</li>
                        <li><span class="ion-chatbubbles"></span>Contact With <a
                                    href="{{ url('chatify').'/'.$lawyer->id }}">Message</a></li>
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
                            <input class="form-control" value="{{ $lawyer->email }}" name="email" type="email"
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
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#input-9').rating();
            $('#average-rate').rating({displayOnly: true});
            $('#case-rate').rating({displayOnly: true});
            $('#education-rate').rating({displayOnly: true});
            $('#client-rate').rating({displayOnly: true});
        });
    </script>
@endsection
