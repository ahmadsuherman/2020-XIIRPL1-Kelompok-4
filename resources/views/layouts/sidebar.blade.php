<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('img\mahaputra.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info"><br>
          <p>Mahaputra Cerdas Utama</p>
         
        </div>
      </div>

       <li class="header">MENU</li>

        
        @if(auth()->user()->role == 'admin')


        <li class="menu-sidebar"><a href="{{ url('/licensor') }}"><i class="fa fa-user"></i> <span>Pemberi Izin</span></a></li>

        <li class="treeview menu">
          <a href="">
            <i class="fa fa-th-large"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="{{url('/items')}}"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
            <li><a href="{{url('/borrows')}}"><i class="fa fa-circle-o"></i> Daftar Peminjam </a></li>
            <li><a href="{{url('/restore')}}"><i class="fa fa-circle-o"></i> Daftar Pengembalian</a></li>

          </ul>
        </li>

        <li class="menu-sidebar"><a href="{{ url('/students') }}"><i class="fa  fa-male"></i> <span>Daftar siswa</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/borrow_item') }}"><i class="fa  fa-pencil-square-o"></i><span> Pinjam Barang</span></a></li>
        @if(auth()->user()->role == 'siswa')
         <li class="menu-sidebar"><a href="{{url('/borrows')}}"><i class="fa  fa-pencil-square-o"></i> <span> Daftar Peminjam</span></a></li>
        @endif

        <li class="header"></li>
        <li class="menu-sidebar"><a href="{{ url ('/borrows/trash') }}"><i class="fa fa-history"></i><span> History</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i><span> Logout</span></a></li> 
      </ul>
    </section>