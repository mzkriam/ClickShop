<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">
            <i class="fas fa-hospital"></i>
            <span class="font-weight-semibold mt-1 mb-0">ClickShop</>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Auth -->
    <li class="nav-item">
        <div class="my-2">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="text-gray-300">User Name</h4>
                </div>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <i class="icon-dashboard"></i>
            <span>{{trans('Dashboard/main-sidebar_trans.index')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- medical_management-->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSection" aria-expanded="true"
            aria-controls="collapseSection">
            <i class="fas fa-fw fa-table"></i>
            <span>{{trans('Dashboard/category.category')}}</span>
        </a>
        <div id="collapseSection" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item text-light" href="{{ route('categories.index') }}">
                    {{trans('Dashboard/category.category')}}
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>
