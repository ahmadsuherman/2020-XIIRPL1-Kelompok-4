<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        
        @if(auth()->user()->role == 'admin')

        <li class="treeview menu">
          <a href="">
            <i class="fa fa-th-large"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="{{url('items')}}"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
            <li><a href="{{url('Borrows')}}"><i class="fa fa-circle-o"></i> Daftar Peminjam </a></li>
            <li><a href="{{url('/restore')}}"><i class="fa fa-circle-o"></i> Daftar Pengembalian</a></li>

          </ul>
        </li>

        <li class="menu-sidebar"><a href="{{ url('/Students') }}"><i class="fa fa-user"></i> <span>Daftar siswa</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/Borrow_item') }}"><i class="fa  fa-pencil-square-o"></i><span> Pinjam Barang</span></a></li>
        @if(auth()->user()->role == 'siswa')
         <li class="menu-sidebar"><a href="{{url('Borrows')}}"><i class="fa  fa-pencil-square-o"></i> <span> Daftar Peminjam</span></a></li>
        @endif

        <li class="header"></li>
        <li class="menu-sidebar"><a href="{{ url('/logout')}}"><i class="glyphicon glyphicon-log-out"></i><span> Logout</span></a></li>


      </ul>
    </section>