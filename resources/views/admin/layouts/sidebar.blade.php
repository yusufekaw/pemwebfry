  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nama_depan." ".Auth::user()->nama_belakang }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> <span>Dashbooard</span></a></li>
        @if(Auth::user()->role!='tambalban')
        <li><a href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span>User</span></a></li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Tambal Ban</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/tambalban') }}"><i class="fa fa-search"></i>Semua Data</a></li>
            <li><a href="{{ url('admin/tambalban/tambah') }}"><i class="fa fa-plus"></i> Tambah Baru</a></li>
          </ul>
        </li></li>
        

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>