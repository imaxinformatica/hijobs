  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('admin')->user()->name}}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{ route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li {{ (Request::is('admin/candidatos') ? 'class=active' : '') }} {{ (Request::is('admin/candidatos/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.candidate')}}">
            <i class="fa fa-users"></i> <span>CANDIDATOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/empresas') ? 'class=active' : '') }} {{ (Request::is('admin/empresas/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.company')}}">
            <i class="fa fa-users"></i> <span>EMPRESAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/user/reports') ? 'class=active' : '') }} {{ (Request::is('admin/user/reports/*') ? 'class=active' : '') }} >
          <a href="{{route('admin.reports')}}">
            <i class="fa fa-cogs"></i> <span>RELATÓRIOS</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>