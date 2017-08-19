<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <!-- .User Profile -->
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                @if(is_null($user->image))
                    <div><img src="{{ asset('default-profile-2.png') }}" alt="user-img" class="img-circle"></div>
                @else
                    <div><img src="{{ asset('storage/avatar/'.$user->image) }}" alt="user-img" class="img-circle"></div>
                @endif
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ ucwords($user->name) }} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{ route('client.profile.index') }}"><i class="ti-user"></i> @lang('app.menu.profileSettings')</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        ><i class="fa fa-power-off"></i> @lang('app.logout')</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>

        </div>

        <!-- .User Profile -->
        <ul class="nav" id="side-menu">
            {{--<li class="sidebar-search hidden-sm hidden-md hidden-lg">--}}
                {{--<!-- / Search input-group this is only view in mobile-->--}}
                {{--<div class="input-group custom-search-form">--}}
                    {{--<input type="text" class="form-control" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>--}}
                        {{--</span>--}}
                {{--</div>--}}
                {{--<!-- /input-group -->--}}
            {{--</li>--}}

            @if(\App\ModuleSetting::clientModule('dashboard'))
                <li><a href="{{ route('client.dashboard.index') }}" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu">@lang('app.menu.dashboard') </span></a> </li>
            @endif

            @if(\App\ModuleSetting::clientModule('projects'))
                <li><a href="{{ route('client.projects.index') }}" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu">@lang('app.menu.projects') </span></a> </li>
            @endif

            @if(\App\ModuleSetting::clientModule('invoices'))
                <li><a href="{{ route('client.invoices.index') }}" class="waves-effect"><i class="ti-receipt"></i> <span class="hide-menu">@lang('app.menu.invoices') </span></a> </li>
            @endif

            @if(\App\ModuleSetting::clientModule('estimates'))
                <li><a href="{{ route('client.estimates.index') }}" class="waves-effect"><i class="icon-doc"></i> <span class="hide-menu">@lang('app.menu.estimates') </span></a> </li>
            @endif

            @if(\App\ModuleSetting::clientModule('issues'))
                <li><a href="{{ route('client.my-issues.index') }}" class="waves-effect"><i class="ti-alert"></i> <span class="hide-menu">@lang('app.menu.issues') </span></a> </li>
            @endif

            @if(\App\ModuleSetting::clientModule('sticky note'))
                <li><a href="{{ route('client.sticky-note.index') }}" class="waves-effect"><i class="icon-note"></i> <span class="hide-menu">@lang('app.menu.stickyNotes') </span></a> </li>
            @endif

        </ul>
    </div>
</div>