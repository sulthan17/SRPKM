<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('adminlte/dist/img/logoupi.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ (Request::is('home')) ? 'active' : null }}">
                <a href="{{ url('/home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @role('admin')

            @elseif('mahasiswa' || 'dosen')
            <li  class="{{ (Request::is('informasi')) ? 'active' : null }}">
                <a href="{{ url('/informasi') }}">
                <i class="fa fa-bullhorn"></i>
                <span>Informasi</span>
                <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
                </span>
                </a>
            </li>
            @endrole
            @role('mahasiswa')
            <li class="{{ (Request::is('pengajuan-dosen')) ? 'active' : null }}">
                <a href="{{ url('/pengajuan-dosen') }}">
                <i class="fa fa-users"></i>
                <span>Pengajuan Dosbim</span>
                <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
                </span>
                </a>
            </li>
            <li class="{{ (Request::is('proposal')) ? 'active' : null }}">
                <a href="{{ url('/proposal') }}">
                <i class="fa fa-book"></i> <span>Proposal</span>
                <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
                </span>
                </a>
            </li>
            @endrole
            @role('admin')
            @elseif('mahasiswa' || 'dosen')
            <li  class="{{ (Request::is('logbook')) ? 'active' : null }}">
                <a href="{{ url('/logbook') }}">
                <i class="fa fa-book"></i> <span>Logbook</span>
                <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
                </span>
                </a>
            </li>
            @endrole
            @role('admin', true)
            <li class="treeview {{ 
                        (Request::is('roles') || 
                        Request::is(
                            'users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit', 
                            'users/create', 'users/deleted')) ? 'active' : null }}">
                <a href="javascript:void(0)">
                    <i class="fa fa-gear"></i> <span>Settings</span>
                    <span class="pull-right-container">
                    <i class="fa  {{ 
                        (Request::is(
                            'roles',
                            'roles/create',
                            'roles/' . Auth::user()->id , 
                            'roles/' . Auth::user()->id . '/edit') || 
                        Request::is('home') || 
                        Request::is(
                            'permissions', 'permissions/' . Auth::user()->id,
                            'permissions/' . Auth::user()->id . '/edit', 
                            'permissions/create', 'permissions/deleted') ||
                        Request::is(
                            'users', 'users/' . Auth::user()->id,
                            'users/' . Auth::user()->id . '/edit', 
                            'users/create', 'users/deleted')) ? 'fa-angle-down' : fa-angle-left }} pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('roles') ? 'active' : null }}"><a href="{{ route('laravelroles::roles.index') }}"><i class="fa fa-circle-o"></i>Role</a></li>
                    <li class=" {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit', 'users/create', 'users/deleted') ? 'active' : null }}"><a href="{{url('/users')}}"><i class="fa fa-circle-o"></i>Users</a></li>
                </ul>
            </li>
            @endrole
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>