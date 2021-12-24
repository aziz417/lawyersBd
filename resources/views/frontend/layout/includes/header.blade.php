<!-- NavigationBar Section -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-responsive" src="{{ asset('frontend') }}/assets/images/logo.png" alt="logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('lawyer.list') }}">Lawyer list</a></li>
                <li><a href="{{ route('case.or.gd') }}">Case or GD</a></li>
                <li><a href="#contact">Contact</a></li>
                <li>
                    @if(!Auth::check())
                        <a href="{{ route('admin') }}">Login Or Registration</a>
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
                <a class="" href="{{ route('admin') }}">
                   Dashboard
                </a>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

