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
        <li {{ (Request::is('admin/customers') ? 'class=active' : '') }} {{ (Request::is('admin/customer/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.customers')}}">
            <i class="fa fa-users"></i> <span>CLIENTES</span>
          </a>
        </li>
        <li {{ (Request::is('admin/providers') ? 'class=active' : '') }} {{ (Request::is('admin/provider/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.providers')}}">
            <i class="fa fa-users"></i> <span>FORNECEDORES</span>
          </a>
        </li>
        <li {{ (Request::is('admin/orders') ? 'class=active' : '') }} {{ (Request::is('admin/order/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.orders')}}">
            <i class="fa fa-archive"></i> <span>PEDIDOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/products') ? 'class=active' : '') }} {{ (Request::is('admin/product/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.products')}}">
            <i class="fa fa-cube"></i> <span>PRODUTOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/batches') ? 'class=active' : '') }} {{ (Request::is('admin/batch/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.batches')}}">
            <i class="fa fa-cubes"></i> <span>LOTES DE PRODUTOS</span>
          </a>
        </li>
        <!-- <li {{ (Request::is('admin/reports') ? 'class=active' : '') }} {{ (Request::is('admin/reports/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.reports')}}">
            <i class="fa fa-bar-chart"></i> <span>RELATÓRIOS</span>
          </a>
        </li> -->
        <li {{ (Request::is('admin/users') ? 'class=active' : '') }} {{ (Request::is('admin/users/*') ? 'class=active' : '') }} >
          <a href="{{ route('admin.users')}}">
            <i class="fa fa-user"></i> <span>USUÁRIOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/user/configuration') ? 'class=active' : '') }} {{ (Request::is('admin/user/configuration/*') ? 'class=active' : '') }} >
          <a href="{{route('admin.configuration')}}">
            <i class="fa fa-cogs"></i> <span>CONFIGURAÇÕES</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>