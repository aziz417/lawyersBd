@extends('frontend.layout.app')
@section('content')


<br>
<br>
<br>
<br>


    <!-- CTA -->
    <section id="cta" class="cta">
        <div class="container">
            <div class="cta-bg">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <p>
                            Lorem Ipsum dolor sit amet, consectetur adipisicing elit. Alias provident libero tenetur asperiores perspiciatis eum, obcaecati ex animi, neque, autem possimus dolor veniam recusandae ipsum aspernatur perferendis aliquid culpa earum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi dolor aperiam, suscipit architecto.
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <h1>
                            Get your free<br>
                            <small>Consultation today</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="cta-btn">
                            <a href="tel:(888)-123-456-7890"><span class="ion-android-call"></span> (888)-123-456-7890</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Practice areas -->
    <section id="practice" class="practice">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <p class="section-subtitle">Check out our</p>
                        <h2 class="section-title">Practice Areas</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="practice-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/Prac-1.jpg">
                        <div class="overlay">
                            <div class="c-table">
                                <div class="ct-cell">
                                    <span class="paractice-icon ion-heart-broken"></span>
                                    <h3 class="practice-title">Medical malpractice</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="practice-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/Prac-2.jpg">
                        <div class="overlay">
                            <div class="c-table">
                                <div class="ct-cell">
                                    <span class="paractice-icon ion-ios-people"></span>
                                    <h3 class="practice-title">Medical malpractice</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="practice-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/Prac-3.jpg">
                        <div class="overlay">
                            <div class="c-table">
                                <div class="ct-cell">
                                    <span class="paractice-icon ion-android-car"></span>
                                    <h3 class="practice-title">Medical malpractice</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="practice-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/Prac-4.jpg">
                        <div class="overlay">
                            <div class="c-table">
                                <div class="ct-cell">
                                    <span class="paractice-icon ion-ios-home"></span>
                                    <h3 class="practice-title">Medical malpractice</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="practice-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/Prac-5.jpg">
                        <div class="overlay">
                            <div class="c-table">
                                <div class="ct-cell">
                                    <span class="paractice-icon ion-person"></span>
                                    <h3 class="practice-title">Medical malpractice</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="practice-box">
                        <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/Prac-6.jpg">
                        <div class="overlay">
                            <div class="c-table">
                                <div class="ct-cell">
                                    <span class="paractice-icon ion-social-usd"></span>
                                    <h3 class="practice-title">Medical malpractice</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/testimonial-1.jpg" alt="testimonial">
                                </div>
                                <div class="col-sm-7">
                                    <p>
                                        Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, Aenean imperdiet. Etiam ultricies nisi vel tellus. PhaseIlus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Phasellus viverra nulls ut metus varius laoreet.
                                    </p>
                                    <span>K. Survy | CEO, Google</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/testimonial-2.jpg" alt="testimonial">
                                </div>
                                <div class="col-sm-7">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of essentially unchanged. It was popularised in the 1960s with the Letraset sheets containing Lorem Ipsum passages.
                                    </p>
                                    <span>K. Survy | CEO, Google</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5">
                                    <img class="img-responsive img-full" src="{{ asset('frontend') }}/assets/images/testimonial-3.jpg" alt="testimonial">
                                </div>
                                <div class="col-sm-7">
                                    <p>
                                        This is Texas Lawyers, an awesome template for Lawyers. It provides everything and more for a lower. Search no more, Download this now.This is Texas Lawyers, an awesome template for Lawyers. It provides everything and more for a lower. Search no more,printer took a galley of essentially unchanged. It was popularised in the 1960s with the Letraset sheets containing Lorem Ipsum.
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
                        This is Texas Lawyers, an awesome template for Lawyers. It provides everything and more for a lower. Search no more, Download this now.This is Texas Lawyers, an awesome template for Lawyers.
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
                            <textarea class="form-control" rows="8" placeholder="Write Message" name="message"></textarea>
                        </div>
                        <button id="cfsubmit" type="submit" class="btn btn-default btn-block">Send your Message <span class="ion-paper-airplane"></span></button>
                    </form>

                    <div id="contactFormResponse"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe -->
    <div id="subscribe"  class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Subscribe to our weekly newsletter</h2>
                    <p>*Dont worry, we dont spam</p>
                </div>
                <div class="col-sm-6">
                    <form class="subscribe-form" id="subscription-form">
                        <div class="form-group">
                            <label class="sr-only" for="subscriber-email">Email address</label>
                            <div class="form-group has-feedback">
                                <div class="input-group">
                                    <span class="input-group-addon ion-email"></span>
                                    <input type="email" id="subscriber-email" class="form-control" placeholder="email" required>
                                </div>
                                <span class="ion-android-checkmark-circle form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div><!--/input-grpup-->

                        <button type="submit" id="subscribe-button" type="submit" class="btn btn-default hide"><i class="ion-heart"></i> Get it</button>
                    </form>

                    <!-- SUCCESS OR ERROR MESSAGES -->
                    <div id="subscription-response"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
