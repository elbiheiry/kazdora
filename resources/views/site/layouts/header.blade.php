<!-- Header
        ====================================-->
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('site.index')}}" class="navbar-brand">
                    <img src="{{asset('assets/site/images/logo.png')}}">
                </a>
                @if(auth()->guest())
                    <ul>
                        <li>
                            <a href="{{route('site.login')}}"> <i class="fa fa-user"></i> login / Sign up </a>
                        </li>
                    </ul><!--End ul-->
                    @else
                    <div class="header-widget profile-header">
                        <div class="dropdown">
                            <a href="{{route('site.profile.wishlist')}}" class="dropdown-toggle">
                                <i class="far fa-heart"></i>
                                <div class="count">{{auth()->user()->wishlists()->count()}}</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="far fa-bell"></i>
                                <div class="count">2</div>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="notify-item">
                                    <div class="notify-img">
                                        <img src="assets/images/user-1.jpg">
                                    </div>
                                    <div class="notify-cont">
                                        The best place for elit, sed do eiusmod tempor dolor sit amet
                                        <div class="notify-time">
                                            <i class="far fa-clock"></i>
                                            Now
                                        </div>
                                    </div>
                                </li>
                                <li class="notify-item">
                                    <div class="notify-img">
                                        <img src="assets/images/user-2.jpg">
                                    </div>
                                    <div class="notify-cont">
                                        The best place for elit, sed do eiusmod tempor dolor sit amet
                                        <div class="notify-time">
                                            <i class="far fa-clock"></i>
                                            Now
                                        </div>
                                    </div>
                                </li>
                                <li class="notify-item">
                                    <div class="notify-img">
                                        <img src="assets/images/user-3.jpg">
                                    </div>
                                    <div class="notify-cont">
                                        The best place for elit, sed do eiusmod tempor dolor sit amet
                                        <div class="notify-time">
                                            <i class="far fa-clock"></i>
                                            Now
                                        </div>
                                    </div>
                                </li>
                                <div class="drop-footer">
                                    <a href="notifactions.html">View All</a>
                                </div>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="far fa-envelope"></i>
                                <div class="count">3</div>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="notify-item">
                                    <a href="message.html">
                                        <div class="notify-img">
                                            <img src="assets/images/user-1.jpg">
                                        </div>
                                        <div class="notify-cont">
                                            The best place for elit, sed do eiusmod tempor dolor sit amet
                                            <div class="notify-time">
                                                <i class="far fa-clock"></i>
                                                Now
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="message.html">
                                        <div class="notify-img">
                                            <img src="assets/images/user-2.jpg">
                                        </div>
                                        <div class="notify-cont">
                                            The best place for elit, sed do eiusmod tempor dolor sit amet
                                            <div class="notify-time">
                                                <i class="far fa-clock"></i>
                                                Now
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="message.html">
                                        <div class="notify-img">
                                            <img src="assets/images/user-3.jpg">
                                        </div>
                                        <div class="notify-cont">
                                            The best place for elit, sed do eiusmod tempor dolor sit amet
                                            <div class="notify-time">
                                                <i class="far fa-clock"></i>
                                                Now
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="drop-footer">
                                    <a href="messages.html">View All</a>
                                </div>
                            </ul>
                        </div>
                        <div class="dropdown profile">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">

                                <img src="{{auth()->user()->getImage()}}">
                                <span>{{auth()->user()->getName()}}</span>
                            </button>
                            <ul class="dropdown-menu profile-dropdown">
                                <div class="heading">
                                    <img src="{{auth()->user()->getImage()}}">
                                    <h3>{{auth()->user()->getName()}}</h3>
                                </div>
                                <ul>
                                    <li>
                                        <a href="{{route('site.profile')}}">
                                            <i class="fa fa-user"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.profile.settings')}}">
                                            <i class="fa fa-cog"></i>
                                            Account Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('site.logout')}}">
                                            <i class="fa fa-power-off"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                @endif
            </div><!--End col-->
        </div><!--End row-->
    </div><!--End Container-->
</header><!--End Header-->