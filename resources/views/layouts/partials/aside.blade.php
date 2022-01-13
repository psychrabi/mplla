<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">
    <div class="brand-container">
        <a href="javascript:" class="brand-link">
            <img src="{{asset('backend/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image opacity-80 shadow">
            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
        <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="javascript:" role="button"><i
                class="fas fa-angle-double-left"></i></a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <!-- Sidebar Menu -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu"
                data-accordion="false">
                <x-nav-link :href="route('admin.dashboard')" icon="fas fa-tachometer-alt" active="admin/dashboard">
                    Dashboard
                </x-nav-link>
                <x-nav-link :href="route('admin.appointments')" icon="fas fa-calendar-alt" active="admin/appointments">
                    Appointments
                </x-nav-link>
                <x-nav-link :href="route('admin.users')" active="admin/users" icon="fas fa-users">Users</x-nav-link>
                <x-nav-link :href="route('admin.settings')" active="admin/settings" icon="fas fa-cogs">Settings
                </x-nav-link>
                <x-nav-link :href="route('admin.settings')" active="" icon="fas fa-sign-out-alt">Logout</x-nav-link>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
<!-- /Main Sidebar Container -->
