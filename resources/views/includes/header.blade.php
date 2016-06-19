<header>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}">Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li @if(Request::is('/')) class="active" @endif><a href="{{route('home')}}">Home</a></li>
                    <li @if(Request::is('about')) class="active" @endif><a href="{{route('about')}}">About Us</a></li>
                    <li @if(Request::is('project')) class="active" @endif><a href="{{route('project')}}">Projects</a>
                    </li>
                    <li @if(Request::is('service')) class="active" @endif><a href="{{route('service')}}">Services</a>
                    </li>

                    @if(Auth::check())
                        <li @if(Request::is('contact')) class="active" @endif><a href="{{route('contact')}}">Contact</a>
                        </li>
                    @endif
                    {{--@if(Auth::check() && 'superuser' == Auth::user()->type)--}}
                    {{--<li class="dropdown">--}}

                    {{--<li @if(Request::is('user')) class="active" @endif><a href="{{url('/user')}}">User</a></li>--}}

                    {{--@endif--}}

                </ul>
                <ul class="nav navbar-nav navbar-right">

                    {{--@if(Auth::check)--}}
                    {{--<li><a href="">Loged as: {{Auth::user()->first_name}}</a></li>--}}
                    {{--@endif--}}
                    @if(Auth::check() && Auth::user()->type =='superuser')
                        <li class="dropdown">
                            <a class="btn btn-toolbar dropdown-toggle"
                               data-toggle="dropdown">Users
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li @if(Request::is('users')) class="active" @endif><a
                                            href="{{route('users')}}">Users All</a></li>
                                <li><a href="{{route('guests')}}">Guests</a></li>
                                <li><a href="{{route('admins')}}">Admins</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::check())

                        <li @if(Request::is('account')) class="active" @endif><a href="{{route('account')}}"><i
                                        class="fa fa-user"
                                        aria-hidden="true"></i>
                                Account</a></li>
                        {{--<li><a href="{{route('logout')}}" class="btn btn-toolbar">Logout</a></li>--}}
                        {{--<li><a class="btn btn-toolbar">Logged as : {{Auth::user()->first_name}}</a></li>--}}
                        <li class="dropdown">
                            <a class="btn btn-toolbar dropdown-toggle"
                               data-toggle="dropdown">Logged as
                                : {{Auth::user()->first_name}} {{ Auth::user()->last_name}}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"
                                                                     aria-hidden="true"></i>
                                        Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li @if(Request::is('register')) class="active" @endif><a href="{{route('register')}}"><i
                                        class="fa fa-users"
                                        aria-hidden="true"></i>
                                Register</a></li>
                        <li @if(Request::is('login')) class="active" @endif ><a href="{{route('login')}}"><i
                                        class="fa fa-sign-in"
                                        aria-hidden="true"></i>
                                Login</a></li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
