<nav class="navbar sticky-top navbar-light navbar-blue">
    <div class="container">
        <div class="col-sm-3">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-responsive registration-form-logo" src="{{ asset('frontend') }}/assets/images/logo.png" alt="logo">
            </a>
        </div>
        <div class="col-sm-9">
            <ul class="nav navbar-nav navbar-right custom-nb">
                <li class="active"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('lawyer.list') }}">Lawyer list</a></li>
                <li><a href="{{ route('case.or.gd') }}">Case or GD</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    @if(!Auth::check())
                        <a href="{{ route('login') }}">Login Or Registration</a>
                    @else
                        <div class="dropdown">
                            <button class="dropbtn">Profile</button>
                            <div class="dropdown-content">
                                <a href="#">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endif
                </li>
                <li>
                    <a class="m-1" href="{{ route('admin') }}">
                        Dashboard
                    </a>

                </li>
            </ul>
        </div>


    </div>


</nav>

<style>
    .auto-suggestion-section{
        width: 100%;
        float: left;
        position: relative;
    }

    .autocomplete-result{
        width: 70%;
        margin: 0 auto;
        position: fixed;
        z-index: 99;
        top: 71px;
        left: 191px;
    }

    .autocomplete-result ul li{
        list-style: none;
    }

</style>

<div class="auto-suggestion-section">
    <div id="show-suggestion" class="autocomplete-result">

    </div>
</div>
