<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/dashboard') }}"> <span class="logo-name">Ecommerce</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::is('dashboard') ? 'active':''}}">
            <a href="{{ url('/dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Administration</li>
        @if (Auth::user()->role == 'Super Admin')
        <li class="dropdown {{ Request::is('admin/user*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>User
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/user/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user/create') }}">New User</a></li>
                <li class="{{ Request::is('admin/user') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/user') }}">User List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/role*') ? 'active':''}}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Role
                    Management</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/role/create*') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role/create') }}">New Role</a></li>
                <li class="{{ Request::is('admin/role') ? 'active':''}}"><a class="nav-link"
                        href="{{ url('admin/role') }}">Role List</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::is('admin/activities*') ? 'active':''}}">
            <a href="{{ url('admin/activities') }}" class="nav-link"><i data-feather="mail"></i><span>Activities
                </span></a>
        </li>
        <li class="dropdown {{ Request::is('admin/email*') ? 'active':''}}">
            <a href="{{ url('admin/email/send') }}" class="nav-link"><i data-feather="mail"></i><span>Email
                    Management</span></a>
        </li>
        @endif





        @if(Helper::authCheck("storeprofile-show") || Helper::authCheck("storeprofile-create")) <li
            class="dropdown {{ Request::is("admin/store-profile*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Store Profile </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("storeprofile-create"))<li
                    class="{{ Request::is("admin/store-profile/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/store-profile/create") }}">New Store Profile</a></li> @endif
                @if(Helper::authCheck("storeprofile-show")) <li
                    class="{{ Request::is("admin/store-profile") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/store-profile") }}">Store Profile List</a></li> @endif </ul>
        </li> @endif
        @if(Helper::authCheck("category-show") || Helper::authCheck("category-create")) <li
            class="dropdown {{ Request::is("admin/category*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Category </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("category-create"))<li
                    class="{{ Request::is("admin/category/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/category/create") }}">New Category</a></li> @endif
                @if(Helper::authCheck("category-show")) <li class="{{ Request::is("admin/category") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/category") }}">Category List</a></li> @endif </ul>
        </li> @endif
        @if(Helper::authCheck("product-show") || Helper::authCheck("product-create")) <li
            class="dropdown {{ Request::is("admin/product*") ? "active":""}}"> <a href="#"
                class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Product </span></a>
            <ul class="dropdown-menu"> @if(Helper::authCheck("product-create"))<li
                    class="{{ Request::is("admin/product/create*") ? "active":""}}"><a class="nav-link"
                        href="{{ url("admin/product/create") }}">New Product</a></li> @endif
                @if(Helper::authCheck("product-show")) <li class="{{ Request::is("admin/product") ? "active":""}}"><a
                        class="nav-link" href="{{ url("admin/product") }}">Product List</a></li> @endif </ul>
        </li> @endif
