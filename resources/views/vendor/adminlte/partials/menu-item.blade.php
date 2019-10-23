 {{-- Custom Menu create. Its active for this now --}}
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="search">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fas fa-search"></i>
            </button>
       </span>
    </div>
    </form>
     
    <li class="header">MAIN NAVIGATION</li> 
    <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
    <a href="/admin/dashboard"> <i class="fas fa-tachometer-alt "></i> <span> Dashboard </span> </a></li>
    @if (Auth::User()->hasGroup('admin') )
    <li class="treeview">
        <a href="/admin/package"> <i class="fas fa-box-open "></i> <span> Packages </span> <span class="pull-right-container"> <i class="fas fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
            <li class="{{ (request()->is('admin/add-package')) ? 'active' : '' }}"> <a href="/admin/add-package"> <i class="far fa-fw fa-circle "></i> <span> Add Package </span> </a> </li>
            <li class="{{ (request()->is('admin/package')) ? 'active' : '' }}"> <a href="/admin/package"> <i class="far fa-fw fa-circle "></i> <span> List Package </span> </a> </li>
        </ul>
    </li>
    <li class="{{ (request()->is('admin/orders')) ? 'active' : '' }}">
        <a href="/admin/orders"> <i class="fas fa-users "></i> <span> Cusomer Orders </span> </a> 
    </li>
    <li class="{{ (request()->is('admin/users')) ? 'active' : '' }}">
        <a href="/admin/users"> <i class="fas fa-users "></i> <span> Users </span> </a>
    </li>
    <li class="{{ (request()->is('admin/package_queries')) ? 'active' : '' }}">
        <a href="/admin/package_queries"> <i class="fas fa-users "></i> <span> Package Queries </span> </a>
    </li>
    <li class="header">Reports</li>

    <li class="{{ (request()->is('admin/user-package-reports')) ? 'active' : '' }}">
        <a href="/admin/user-package-reports"> <i class="fas fa-fw fa-user "></i> <span> User Package Report </span> </a>
    </li>
    <li class="{{ (request()->is('admin/audit-logs')) ? 'active' : '' }}">
    <a href="/admin/audit-logs">
        <i class="fas fa-fw fa-user "></i> <span> Audit Log </span> </a></li>
    <li class="{{ (request()->is('admin/error-logs')) ? 'active' : '' }}">
        <a href="/admin/error-logs"> <i class="fas fa-fw fa-user "></i> <span>  Error Log </span> </a>
    </li>
    @endif
    <li class="header">ACCOUNT SETTINGS</li>

    <li class="{{ (request()->is('admin/profile')) ? 'active' : '' }}">
        <a href="/admin/profile"> <i class="fas fa-fw fa-user "></i> <span> Profile </span> </a>
    </li>
    <li class="{{ (request()->is('admin/settings')) ? 'active' : '' }}">
        <a href="/admin/settings"> <i class="fas fa-fw fa-lock "></i> <span> Change Password </span></a>
    </li>
             
    
     