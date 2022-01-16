<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li>
                <a href="{{ url('/') }}"><i class="fa fa-chevron-right"></i> <span class="nav-label"><strong
                                style="font-size: 20px">F</strong>rontend</span></a>
            </li>
            <li class="nav-header">
                <div class="dropdown profile-element">
                    @php
                        $user = Auth::user()->register;
                    @endphp
                    <img src="{{ $user->image()->first()->url ?? '' }}"
                         alt="image" class="rounded-circle"
                         style="width: 48px; height: 48px"
                    />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ auth()->user()->name ?? '' }}</span>
                        <span class="text-muted text-xs block">{{ auth()->user()->email ?? '' }}<b
                                    class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            {{--our sidebar menu--}}
            {{--            all available--}}
            <li class="{{ request()->routeIs('admin') ? 'active' : ''  }}">
                <a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li class="{{ request()->routeIs('messages.*') ? 'active' : ''  }} {{ request()->routeIs('reply.*') ? 'active' : ''  }}">
                <a href="{{ route('messages.index') }}">
                    <i class="fa fa-envelope-o"></i>
                    <span class="nav-label">Messages</span>
                </a>
            </li>

            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                <li class="{{ request()->routeIs('all.users') ? 'active' : ''  }}">
                    <a href="{{ route('all.users', 'lawyer') }}"><i class="fa fa-user"></i> <span
                                class="nav-label">Lawyers</span></a>
                </li>
            @endif
            {{--            just admin--}}
            @if(Auth::user()->role == 'admin')
                <li class="{{ request()->routeIs('all.users.*') ? 'active' : ''  }}">
                    <a href="{{ route('all.users', 'user') }}"><i class="fa fa-users"></i> <span
                                class="nav-label">Users</span></a>
                </li>
                <li class="{{ request()->routeIs('boards.*') ? 'active' : ''  }}">
                    <a href="{{ route('boards.index') }}"><i class="fa fa-adjust"></i> <span
                                class="nav-label">Boards</span></a>
                </li>
                <li class="{{ request()->routeIs('institutes.*') ? 'active' : ''  }}">
                    <a href="{{ route('institutes.index') }}"><i class="fa fa-institution"></i> <span class="nav-label">Institutes</span></a>
                </li>
                <li class="{{ request()->routeIs('subjects.*') ? 'active' : ''  }}">
                    <a href="{{ route('subjects.index') }}"><i class="fa fa-book" aria-hidden="true"></i> <span
                                class="nav-label">Subjects</span></a>
                </li>
                <li class="{{ request()->routeIs('sections.*') ? 'active' : ''  }}">
                    <a href="{{ route('sections.index') }}"><i class="fa fa-bars" aria-hidden="true"></i> <span
                                class="nav-label">Sections</span></a>
                </li>
                <li class="{{ request()->routeIs('categories.*') ? 'active' : ''  }}">
                    <a href="{{ route('categories.index') }}"><i class="fa fa-bars" aria-hidden="true"></i> <span
                                class="nav-label">Categories</span></a>
                </li>
                <li class="{{ request()->routeIs('caseTypes.*') ? 'active' : ''  }}">
                    <a href="{{ route('caseTypes.index') }}"><i class="fa fa-bars" aria-hidden="true"></i> <span
                                class="nav-label">Case Types</span></a>
                </li>

                <li class="{{ request()->routeIs('setting.*') ? 'active' : ''  }}">
                    <a href="javascript:void(0)"><i class="fa fa-bar-chart-o"></i>
                        <span class="nav-label">Manage Settings</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse sidebar_background_color">
                        <li class="{{ request()->routeIs('setting.*') ? 'active' : ''  }}"><a
                                    href="{{ route('settings.index') }}">Site Setting</a></li>
                        <li class="{{ request()->routeIs('social.*') ? 'active' : ''  }}"><a
                                    href="{{ route('socials.index') }}">Social</a></li>
                        <li class="{{ request()->routeIs('slider.*') ? 'active' : ''  }}">
                            <a href="{{ route('sliders.index') }}"><i class="fa fa-photo"></i>
                                <span class="nav-label">Sliders</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->role == 'lawyer' || Auth::user()->role == 'user')
                <li class="{{ request()->routeIs('case.*') ? 'active' : ''  }}">
                    <a href="{{ route('case.manage') }}"><i class="fa fa-adjust"></i> <span class="nav-label">Case {{ Auth::user()->role == 'lawyer' ? 'Manage' : '' }}</span></a>
                </li>
                <li class="{{ request()->routeIs('applied.*') ? 'active' : ''  }}">
                    <a href="{{ route('applied.cases') }}"><i class="fa fa-adjust"></i>Applied Cases</a>
                </li>
            @endif
            {{--           just lawyer--}}
            @if(Auth::user()->role == 'lawyer')
                <li class="{{ request()->routeIs('rate.*') ? 'active' : ''  }}">
                    <a href="{{ route('rate.show') }}"><i class="fa fa-bars" aria-hidden="true"></i> <span
                                class="nav-label">Your Rating Panel</span></a>
                </li>
                <li class="{{ request()->routeIs('client.*') ? 'active' : ''  }}">
                    <a href="{{ route('client.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span
                                class="nav-label">Your Clients</span></a>
                </li>
            @endif
        </ul>
    </div>
</nav>
