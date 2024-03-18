<aside class="side-menu">
    <ul>
        <button class="toggle-btn custom-btn">
            <i class="fa fa-times"></i> Close
        </button>
        <li class="@if(request()->route()->getName() == 'admin.dashboard'){{'active'}}@endif">
            <a href="{{route('admin.dashboard')}}">
                home Page
            </a>
        </li>
        <li class="@if(request()->route()->getName() == 'admin.amenities'){{'active'}}@endif">
            <a href="{{route('admin.amenities')}}">
                Amenities
            </a>
        </li>
        <li class="@if(request()->route()->getName() == 'admin.cities'){{'active'}}@endif">
            <a href="{{route('admin.cities')}}">
                City
            </a>
        </li>
    </ul><!--End Ul-->
</aside>