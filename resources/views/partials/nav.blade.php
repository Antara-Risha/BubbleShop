@if (auth()->user()->type == 1)
    <a class="nav-link" href="{{ route('admin.items.index') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        Items
    </a>
    <a class="nav-link" href="{{ route('admin.orders') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        Orders
    </a>

    <div class="sb-sidenav-menu-heading">Settings</div>
    <a class="nav-link" href="{{ route('admin.users.index') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
        Users
    </a>
@endif

{{--  Customer nav  --}}
@if (auth()->user()->type == 2)
    <a class="nav-link" href="{{ route('customer.available-items') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        Available Items
    </a>
    <a class="nav-link" href="{{ route('customer.orders.index') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        Orders
    </a>
@endif

<a class="nav-link" href="{{ route('change-password') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
    Change Password
</a>
