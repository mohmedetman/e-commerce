<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link logo-switch">
        {{--         <img src="{{ asset('/') }}admin/dist/img/logo.png" class="brand-image-xl logo-xs">--}}
        <img src="{{ asset('/') }}admin/custom/logo1.png" class="brand-image-xs">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{--      <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
        {{--        <div class="image">--}}
        {{--          <img src="{{ asset('/') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
        {{--        </div>--}}
        {{--        <div class="info">--}}
        {{--          <a href="#" class="d-block">Admin</a>--}}
        {{--        </div>--}}
        {{--      </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon  fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- @if($apps['project']==1) --}}
                    <li class="nav-item @if(request()->is("admin/project-category")) menu-open @endif">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Projects
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{ url('admin.project-category.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('admin.project.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Projects</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                {{-- @endif --}}

                {{-- @if($apps['service']==1) --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>
                                Services
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin.service-category.index') }}" class="nav-link">
                                    <i class="fas fa-ellipsis-h nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="{{ url('admin.service.index') }}" class="nav-link">
                                    <i class="fas fa-ellipsis-h nav-icon"></i>
                                    <p>Service </p>
                                </a>
                            </li>
                        </ul>
                    </li>
              
               
              
              

                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
