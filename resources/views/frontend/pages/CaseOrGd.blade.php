@extends('frontend.layout.app')
@section('content')
    <!-- Consultation -->
    <section id="consultation" class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <p class="section-subtitle">Fill out the form below to recieve a free and confidential intial consultation.</p>
                        <h2 class="section-title">REQUEST A FREE CONSULTATION</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <form id="consultation-form" class="consultation-form">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="selectpicker" data-live-search="true" data-width="100%">
                                <option data-tokens="family">Family Law</option>
                                <option data-tokens="business">Business Law</option>
                                <option data-tokens="civil litigation">Civil Litigation</option>
                                <option data-tokens="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea class="form-control" rows="8" placeholder="Case Description..." id="case-des" name="case-des"></textarea>
                            <!-- <input type="text" class="form-control" id="case-des" placeholder="Case Description..."> -->
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-4">
                        <button id="cnfsubmit" type="submit" class="btn btn-default btn-block btn-cn">Get Consultation</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
