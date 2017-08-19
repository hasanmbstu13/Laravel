<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <!-- .User Profile -->
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                @if(is_null($user->image))
                    <div><img src="{{ asset('default-profile.jpg') }}" alt="user-img" class="img-circle"></div>
                @else
                    <div><img src="{{ asset('storage/avatar/'.$user->image) }}" alt="user-img" class="img-circle"></div>
                @endif
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ ucwords($user->name) }} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{ route('admin.settings.edit', ['1']) }}"><i class="ti-settings"></i> @lang('app.menu.accountSettings')</a></li>
                    <li>
                        <a href="{{ route('member.dashboard') }}">
                            <i class="fa fa-sign-in"></i> @lang('app.loginAsEmployee')
                        </a>
                    </li>
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
            <li><a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu">@lang('app.menu.dashboard') </span></a> </li>
            <li><a href="{{ route('admin.clients.index') }}" class="waves-effect"><i class="icon-people"></i> <span class="hide-menu">@lang('app.menu.clients') </span></a> </li>
            <li><a href="{{ route('admin.employees.index') }}" class="waves-effect"><i class="icon-user"></i> <span class="hide-menu">@lang('app.menu.employees') </span></a> </li>
            <li><a href="{{ route('admin.projects.index') }}" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu">@lang('app.menu.projects') </span></a> </li>
            <li><a href="{{ route('admin.task-calendar.index') }}" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu">@lang('app.menu.taskCalendar') </span></a> </li>
            <li><a href="{{ route('admin.estimates.index') }}" class="waves-effect"><i class="ti-file"></i> <span class="hide-menu">@lang('app.menu.estimates') </span></a> </li>
            <li><a href="{{ route('admin.all-invoices.index') }}" class="waves-effect"><i class="ti-receipt"></i> <span class="hide-menu">@lang('app.menu.invoices') </span></a> </li>
            <li><a href="{{ route('admin.payments.index') }}" class="waves-effect"><i class="fa fa-money"></i> <span class="hide-menu">@lang('app.menu.payments') </span></a> </li>
            <li><a href="{{ route('admin.all-issues.index') }}" class="waves-effect"><i class="ti-alert"></i> <span class="hide-menu">@lang('app.menu.issues') </span></a> </li>
            <li><a href="{{ route('admin.all-time-logs.index') }}" class="waves-effect"><i class="icon-clock"></i> <span class="hide-menu">@lang('app.menu.timeLogs') </span></a> </li>
            <li><a href="{{ route('admin.all-tasks.index') }}" class="waves-effect"><i class="ti-layout-list-thumb"></i> <span class="hide-menu">@lang('app.menu.tasks')</span></a> </li>
            <li><a href="{{ route('admin.notices.index') }}" class="waves-effect"><i class="ti-layout-media-overlay"></i> <span class="hide-menu">@lang('app.menu.noticeBoard') </span></a> </li>
            <li><a href="{{ route('admin.sticky-note.index') }}" class="waves-effect"><i class="icon-note"></i> <span class="hide-menu">@lang('app.menu.stickyNotes') </span></a> </li>
            <li><a href="{{ route('admin.reports.index') }}" class="waves-effect"><i class="ti-pie-chart"></i> <span class="hide-menu"> @lang('app.menu.reports') <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.task-report.index') }}">@lang('app.menu.taskReport')</a></li>
                    <li><a href="{{ route('admin.time-log-report.index') }}">@lang('app.menu.timeLogReport')</a></li>
                    <li><a href="{{ route('admin.finance-report.index') }}">@lang('app.menu.financeReport')</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.settings.index') }}" class="waves-effect"><i class="ti-settings"></i> <span class="hide-menu"> @lang('app.menu.settings') <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.settings.edit', ['1']) }}">@lang('app.menu.accountSettings')</a></li>
                    <li><a href="{{ route('admin.profile-settings.index') }}">@lang('app.menu.profileSettings')</a></li>
                    <li><a href="{{ route('admin.email-settings.index') }}">@lang('app.menu.emailSettings')</a></li>
                    <li><a href="{{ route('admin.module-settings.index') }}">@lang('app.menu.moduleSettings')</a></li>
                    <li><a href="{{ route('admin.currency.index') }}">@lang('app.menu.currencySettings')</a></li>
                    <li><a href="{{ route('admin.theme-settings.index') }}">@lang('app.menu.themeSettings')</a></li>
                    <li><a href="{{ route('admin.payment-gateway-credential.index') }}">@lang('app.menu.paymentGatewayCredential')</a></li>
                </ul>
            </li>


        </ul>
    </div>
</div>