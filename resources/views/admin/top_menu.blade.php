<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#sidebar-menu" data-toggle="sidebar-menu" data-effect="st-effect-3" class="toggle pull-left visible-xs"><i class="fa fa-bars"></i></a>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{route('admin.dashboard')}}" class="navbar-brand hidden-xs navbar-brand-primary">e-NYUMBANI ADMIN</a>
        </div>
        <div class="navbar-collapse collapse" id="collapse">
            <ul class="nav navbar-nav navbar-right">

                <!-- user -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/admin-inc/images/people/user-avatar.jpg"
                        alt="" class="img-circle" />
                        {{Auth::guard('admin')->user()->lastname}}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('admin.user',['id'=>Auth::guard('admin')->id()])}}"><i class="fa fa-user"></i>Profile</a></li>
                        <li>
                            <a href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}</form>

                        </li>
                    </ul>
                </li>
                <!-- // END user -->
            </ul>
        </div>
    </div>
</div>
