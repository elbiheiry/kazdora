<header>
    <button class="toggle-btn icon-btn">
        <i class="fa fa-bars"></i>
    </button>
    <a href="{{route('admin.dashboard')}}" class="logo">
        <img src="{{asset('assets/admin/images/logo.png')}}">
    </a>
    <ul class="top-header-links">

        <li>
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <div class="count">12</div>
            </button>
            <div class="dropdown-menu">
                <div class="item-list">
                    <img src="assets/admin/images/user-1.jpg">
                    <div class="item-content">
                        hi , i have some questions for you, call me.
                        <span>
                                    <i class="fa fa-clock"></i> Now
                                </span>
                    </div>
                </div> <!--End Item List-->
                <div class="item-list">
                    <img src="assets/admin/images/user-2.jpg">
                    <div class="item-content">
                        hi , i have some questions for you, call me.
                        <span>
                                    <i class="fa fa-clock"></i> 7 hours
                                </span>
                    </div>
                </div><!--End Item List-->
                <div class="item-list">
                    <img src="assets/admin/images/user-3.jpg">
                    <div class="item-content">
                        hi , i have some questions for you, call me.
                        <span>
                                    <i class="fa fa-clock"></i> 1 day
                                </span>
                    </div>
                </div><!--End Item List-->
                <div class="drop-footer">
                    <a href="notifications.html">view all</a>
                </div>
            </div><!--End Dropdown Menu-->
        </li><!--End li-->
        <li>
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static"  aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i>
                <div class="count">13</div>
            </button>
            <div class="dropdown-menu">
                <div class="item-list">
                    <a href="message.html">
                        <img src="assets/admin/images/user-1.jpg">
                        <div class="item-content">
                            hi , i have some questions for you, call me.
                            <span>
                                        <i class="fa fa-clock"></i> Now
                                    </span>
                        </div>
                    </a>
                </div><!--End Item List-->
                <div class="item-list">
                    <a href="message.html">
                        <img src="assets/admin/images/user-2.jpg">
                        <div class="item-content">
                            hi , i have some questions for you, call me.
                            <span>
                                        <i class="fa fa-clock"></i> 8 hours
                                    </span>
                        </div>
                    </a>
                </div> <!--End Item List-->
                <div class="item-list">
                    <a href="message.html">
                        <img src="assets/admin/images/user-3.jpg">
                        <div class="item-content">
                            hi , i have some questions for you, call me.
                            <span>
                                        <i class="fa fa-clock"></i> 1 day
                                    </span>
                        </div>
                    </a>
                </div> <!--End Item List-->
                <div class="drop-footer">
                    <a href="messages.html">view all</a>
                </div>
            </div> <!--End Dropdown Menu-->
        </li> <!--End li-->
        <li>
            <button type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('assets/admin/images/user-1.jpg')}}">
                <span>{{auth()->guard('admins')->user()->name}}</span>
            </button>
            <div class="dropdown-menu">
                <div class="menu-heading">
                    <img src="{{asset('assets/admin/images/user-1.jpg')}}">
                    <h3>{{auth()->guard('admins')->user()->name}}</h3>
                    {{--<p><span></span>online</p>--}}
                </div>
                <ul>
                    <li>
                        <a href="profile.html">
                            <i class="fa fa-user"></i>
                            profile
                        </a>
                    </li>
                    <li>
                        <a href="account_setting.html">
                            <i class="fa fa-cog"></i>
                            setting
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.logout')}}">
                            <i class="fa fa-power-off"></i>
                            logout
                        </a>
                    </li>
                </ul>
            </div> <!--End Dropdown Menu-->
        </li> <!--End li-->
    </ul>
</header>