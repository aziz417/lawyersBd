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
                    </div>
                @empty
                    <p class="text-center">No Layers</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section id="testimonial" class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                    <div id="test-slider" class="owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-responsive img-full"
                                         src="{{ asset('frontend') }}/assets/images/testimonial-1.jpg"
                                         alt="testimonial">
                                </div>
                                <div class="col-sm-7">
                                    <p>
                                        Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat
                                        vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat
                                        a, Aenean imperdiet. Etiam ultricies nisi vel tellus. PhaseIlus viverra nulla ut
                                        metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
                                        augue. Phasellus viverra nulls ut metus varius laoreet.
                                    </p>
                                    <span>K. Survy | CEO, Google</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-responsive img-full"
                                         src="{{ asset('frontend') }}/assets/images/testimonial-2.jpg"
                                         alt="testimonial">
                                </div>
                                <div class="col-sm-7">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of essentially unchanged. It was popularised in
                                        the 1960s with the Letraset sheets containing Lorem Ipsum passages.
                                    </p>
                                    <span>K. Survy | CEO, Google</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-responsive img-full"
                                         src="{{ asset('frontend') }}/assets/images/testimonial-3.jpg"
                                         alt="testimonial">
                                </div>
                                <div class="col-sm-7">
                                    <p>
                                        This is Texas Lawyers, an awesome template for Lawyers. It provides everything
                                        and more for a lower. Search no more, Download this now.This is Texas Lawyers,
                                        an awesome template for Lawyers. It provides everything and more for a lower.
                                        Search no more,printer took a galley of essentially unchanged. It was
                                        popularised in the 1960s with the Letraset sheets containing Lorem Ipsum.
                                    </p>
                                    <span>K. Survy | CEO, Google</span>
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
            $('.average-rate').rating({displayOnly: true});
        });
    </script>
@endsection
