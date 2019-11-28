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
        <li {{ (Request::is('admin/paginas') ? 'class=active' : '') }} {{ (Request::is('admin/paginas/*') ? 'class=active' : '') }} >
          <a href="{{route('admin.pages')}}">
            <i class="fa fa-file" aria-hidden="true"></i> <span>PÁGINAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/candidatos') ? 'class=active' : '') }} {{ (Request::is('admin/candidatos/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.candidate')}}">
            <i class="fa fa-users"></i> <span>CANDIDATOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/empresas') ? 'class=active' : '') }} {{ (Request::is('admin/empresas/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.company')}}">
            <i class="fa fa-building" aria-hidden="true"></i> <span>EMPRESAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/vagas') ? 'class=active' : '') }} {{ (Request::is('admin/vagas/*') ? 'class=active' : '') }} >
          <a href="{{route('admin.opportunities')}}">
            <i class="fa fa-address-card-o" aria-hidden="true"></i> <span>VAGAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/planos') ? 'class=active' : '') }} {{ (Request::is('admin/planos/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.plan')}}">
            <i class="fa fa-users"></i> <span>PLANOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/videos') ? 'class=active' : '') }} {{ (Request::is('admin/videos/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.video')}}">
            <i class="fa fa-play-circle-o" aria-hidden="true"></i> <span>VIDEOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/parceiros') ? 'class=active' : '') }} {{ (Request::is('admin/parceiros/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.partner')}}">
            <i class="fa fa-handshake-o" aria-hidden="true"></i> <span>PARCEIROS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/configuracao') ? 'class=active' : '') }} >
          <a href="{{ route('admin.configuration.edit')}}">
            <i class="fa fa-cog" aria-hidden="true"></i> <span>CONFIGURAÇÃO</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
