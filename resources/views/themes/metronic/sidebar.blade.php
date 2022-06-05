<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu  <?php echo isset($collapse) && $collapse  ? "page-sidebar-menu-closed" : "";?>" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- dashboard Admin -->
           
            <li class="nav-item start ">
                <a href="/dashboard" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                 
            </li>
            <li class="nav-item start {{ Request()->route()->action['prefix'] === '/client' ? 'active' : '' }} ">
                <a href="{{ route('client') }}" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Client</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                 
            </li>
            <li class="nav-item start {{ Request()->route()->action['prefix'] === '/teams' ? 'active' : '' }} ">
                <a href="{{ route('team') }}" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Teams</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                 
            </li>
            <li class="nav-item start {{ Request()->route()->action['prefix'] === '/portpolio' ? 'active' : '' }} ">
                <a href="{{ route('portopolio') }}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">Portopolio</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                 
            </li>
            
            <li class="nav-item ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-bag"></i>
                    <span class="title">Log</span>
                    <span class="selected "></span>
                </a>
                
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
