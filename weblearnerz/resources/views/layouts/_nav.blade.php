<div class="container-fluid">
    <div class="navbar navbar-purple navbar-twitch" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <span class="small-nav"> <span class="logo"></span> </span>
                    <span class="full-nav"></span>
                </a>
            </div>
            <div class="">
                <ul class="nav navbar-nav">
                    @if(Auth::guest())
                        <li >
                            <a href="{{ url('/') }}">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Home">
							<span class="glyphicon glyphicon-home"></span>
						</span>
                                <span class="full-nav"> Home </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/login') }}">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Login">
							<span class="fa fa-sign-in"></span>
						</span>
                                <span class="full-nav"> Login </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/register') }}">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Register">
							<span class="fa fa-sign-out"></span>
						</span>
                                <span class="full-nav">Register</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('/home') }}">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Home">
							<span class="glyphicon glyphicon-home"></span>
						</span>
                                <span class="full-nav"> Home </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
						<span class="small-nav" data-toggle="tooltip" data-placement="right" title="Logout">
							<span class="fa fa-sign-out"></span>
						</span>
                                <span class="full-nav">Logout</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <button type="button" class="btn btn-default btn-xs navbar-twitch-toggle pull-right">
        <span class="glyphicon glyphicon-chevron-right nav-open"></span>
        <span class="glyphicon glyphicon-chevron-left nav-close"></span>
    </button>

    <div class="container">
        @yield("content")
    </div>
</div>
