<div class="col-lg-3">
    <div class="prof-icon">
        <i class="fa fa-user"></i> Profile Menu
    </div>
    <aside class="profile-side">
        <div class="prof-icon">Close Menu</div>
        <div class="profile-head">
            <div class="profile-head-img">
                <img src="{{auth()->user()->getImage()}}">
                <span> {{auth()->user()->getName()}}</span>
                <div class="stat">user</div>
            </div>
            <ul class="profile-links">
                <li class="@if(request()->route()->getName() == 'site.profile'){{'active'}}@endif">
                    <a href="{{route('site.profile')}}">
                        <i class="fa fa-info"></i>
                        Basic Information
                    </a>
                </li>
                <li class="@if(request()->route()->getName() == 'site.profile.settings'){{'active'}}@endif">
                    <a href="{{route('site.profile.settings')}}">
                        <i class="fa fa-cog"></i>
                        Account Settings
                    </a>
                </li>
                <li class="@if(request()->route()->getName() == 'site.profile.wishlist'){{'active'}}@endif">
                    <a href="{{route('site.profile.wishlist')}}">
                        <i class="far fa-heart"></i>
                        Wishlist
                    </a>
                </li>
                <li class="@if(request()->route()->getName() == 'site.profile.ads'){{'active'}}@endif">
                    <a href="{{route('site.profile.ads')}}">
                        <i class="fa fa-list"></i>
                        My Ads
                    </a>
                </li>
                <li>
                    <a href="financial.html">
                        <i class="fas fa-dollar-sign"></i>
                        Financial transactions
                    </a>
                </li>
                <li>
                    <a href="{{route('site.logout')}}">
                        <i class="fa fa-power-off"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </aside><!--End Aside-->
</div>