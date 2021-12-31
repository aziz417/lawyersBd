@extends('frontend.layout.app')
@section('content')
    @include('flashMsg')

    <!-- Fun Facts -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-5">
                    <div class="my-5">
                        <h2>{{ isset($lawyer->user->rate->clint_rate) && $lawyer->user->rate->clint_rate ? 'Update' : 'Submit' }}
                            Your Rate:</h2>
                        <form action="{{ route('submit.rate') }}" method="post">
                            @csrf
                            <input type="hidden" name="lawyer_id" value="{{ $lawyer->user_id }}">
                            <input id="input-9" name="client_rate" value="{{ $lawyer->user->rate->clint_rate ?? 0 }}"
                                   required class="rating-loading">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>&nbsp;
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h2 class="section-title text-center"><span
                                class="text-danger">{{ $lawyer->applicants_name }}</span> Rating Panel</h2>
                </div>

                <div class="col-sm-3">
                    <div class="p-4">
                        <h2>Average Rate:</h2>
                        <input id="average-rate" value="{{ $lawyer->user->rate->average_rate ?? 0 }}"
                               class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="p-4">
                        <h2>Client Rate:</h2>
                        <input id="client-rate" value="{{ $lawyer->user->rate->clint_rate ?? 0 }}"
                               class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="p-4">
                        <h2>Case Rate:</h2>
                        <input id="case-rate" value="{{ $lawyer->user->rate->case_rate ?? 0 }}" class="rating-loading"
                               data-min="0" data-max="5" data-step="0.1">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="p-4">
                        <h2>Education Rate:</h2>
                        <input id="education-rate" value="{{ $lawyer->user->rate->education_rate ?? 0 }}"
                               class="rating-loading" data-min="0" data-max="5" data-step="0.1">
                    </div>
                </div>
            </div>


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
                    <div id="slider_1" class="owl-carousel">
                        @forelse($win_cases as $key => $case)
                            <div class="item">
                                <div class="slider-1-item-box">
                                    <h2>{{ $case->title }}</h2>
                                    <p>
                                        {{ $case->description }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <h2 class="text-center">No Case Success</h2>
                        @endforelse
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
                                     src="{{ isset($client->image->url) ? $client->image->url : '' }}" alt="user image">
                            </a>
                        </div>
                    </div>
                @empty
                    <h2 class="text-center">No Satisfied clients</h2>
                @endforelse
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="faq overlay-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <p class="section-subtitle">You may want to know</p>
                        <h2 class="section-title">frequently asked questions</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        My wife is not allowing me to see my children,what can I do?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What paperwork do I need to complete to file for divorce?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How to make a General Diary and How much monEy is spent?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Why, how, where do we need to keep corporate records?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
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
                        <p class="section-subtitle">You may want to</p>
                        <h2 class="section-title">Contact us</h2>
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
                    <form id="contactForm" action="php/contact_form.php" method="post">
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
                            <input class="form-control" name="email" type="email" placeholder="Email address" required>
                        </div>
                        <div class="input-group">
                                    <span class="input-group-addon custom-addon">
                                        <i class="ion-chatbubbles"></i>
                                    </span>
                            <textarea class="form-control" rows="8" placeholder="Write Message"
                                      name="message"></textarea>
                        </div>
                        <button id="cfsubmit" type="submit" class="btn btn-default btn-block">Send your Message <span
                                    class="ion-paper-airplane"></span></button>
                    </form>

                    <div id="contactFormResponse"></div>
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
