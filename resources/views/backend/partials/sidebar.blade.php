<div class="sl-logo"><a href="{{ route('admin.dashboard') }}"><i class="icon ion-android-star-outline"></i> Dr. Personal</a></div>
    <div class="sl-sideleft">

    <div class="sl-sideleft-menu">
    <a href="{{ route('admin.dashboard') }}" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{ route('admin.categories') }}" class="sl-menu-link @yield('category')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Category</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{ route('admin.sliders') }}" class="sl-menu-link @yield('slider')">
        <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Slider</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{ route('admin.abouts') }}" class="sl-menu-link  @yield('about')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">About</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{ route('admin.appoints') }}" class="sl-menu-link @yield('appoint')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Appoint List</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('admin.services') }}" class="sl-menu-link @yield('service')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Service</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    <a href="{{ route('admin.ourteams') }}" class="sl-menu-link  @yield('ourteam')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Our team</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('admin.policy') }}" class="sl-menu-link  @yield('policy')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Our Policy</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="{{ route('admin.blogs') }}" class="sl-menu-link @yield('blog')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Blog</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    <a href="{{ route('admin.contacts') }}" class="sl-menu-link @yield('adcontact')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">Message</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="#" class="sl-menu-link @yield('setting')">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Settings</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('admin.settings') }}" class="nav-link @yield('view-setting')">View Setting</a></li>

        <li class="nav-item"><a href="{{ route('admin.casecats') }}" class="nav-link @yield('view-casecat')">View Case Category</a></li>

        <li class="nav-item"><a href="{{ route('admin.lastestcases') }}" class="nav-link @yield('view-lastest')">View Latest Case</a></li>
    </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->