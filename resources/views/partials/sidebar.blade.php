<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="menu-icon">
                    <i class="fas fa-dashboard"></i>
                </i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('restaurant') }}">
                <i class="menu-icon">
                    <i class="fas fa-business-time"></i>
                </i>
                <span class="menu-title">Restaurant</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('customer') }}">
                <i class="menu-icon">
                    <i class="fas fa-people-arrows"></i>
                </i>
                <span class="menu-title">Customer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('delivery-people') }}">
                <i class="menu-icon">
                    <i class="fas fa-car"></i>
                </i>
                <span class="menu-title">Delivery People</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('settings') }}">
                <i class="menu-icon">
                    <i class="fas fa-cogs"></i>
                </i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('promocodes') }}">
                <i class="menu-icon">
                    <i class="fas fa-users"></i>
                </i>
                <span class="menu-title">Promo Codes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">
                <i class="menu-icon">
                    <i class="fas fa-user-edit"></i>
                </i>
                <span class="menu-title">User</span>
            </a>
        </li>
    </ul>
</nav>

