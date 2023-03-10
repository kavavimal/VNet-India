<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ request()->is('/*') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('dashboard') }}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            @can('category-tab-show')
                <li class="nav-item {{ request()->is('category*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('category-index') }}">
                        <i class="nav-icon i-Navigation-Left-Window"></i>
                        <span class="nav-text">Menu</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @can('product-tab-show')
                <li class="nav-item {{ request()->is('submenu*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('submenu-index') }}">
                        <i class="nav-icon i-Computer-Secure"></i>
                        <span class="nav-text">Sub Menu</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @can('plan-create')
                <li class="nav-item {{ request()->is('plan/edit*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('plan-edit','new') }}">
                        <i class="nav-icon i-Add-Cart"></i>
                        <span class="nav-text">Create New Plan</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @can('plan-tab-show')
                <li class="nav-item {{ request()->is('plan*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('plan-index') }}">
                        <i class="nav-icon i-Plane"></i>
                        <span class="nav-text">Plan Bucket</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @can('user-tab-show')
                <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('user-index') }}">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="nav-text">User</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan
            @can('role-tab-show')
                <li class="nav-item {{ request()->is('role*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('roles.index') }}">
                        <i class="nav-icon i-Add-UserStar"></i>
                        <span class="nav-text">Roles</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan           
            @can('user-plan-tab-show')
                <li class="nav-item {{ request()->is('userPlan*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('user-plan-index') }}">
                        <i class="nav-icon i-Data-Cloud"></i>
                        <span class="nav-text">User Plans</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan           
            @can('user-plan-create')
                <li class="nav-item {{ request()->is('userPlan/edit*') ? 'active' : '' }}">
                    <a class="nav-item-hold" href="{{ route('user-plan-edit','new') }}">
                        <i class="nav-icon i-Add-Cart"></i>
                        <span class="nav-text">Create New Plan</span>
                    </a>
                    <div class="triangle"></div>
                </li>
            @endcan
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
