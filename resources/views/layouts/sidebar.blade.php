<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        
        @if(auth()->user()->role == 'admin')
        <li class="menu-sidebar"><a href="{{ url('/items') }}"><span class="fa fa-calendar-minus-o"></span> Daftar Barang</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/Borrows') }}"><span class="fa fa-calendar-minus-o"></span> Daftar Peminjam</span></a></li>
        
        <li class="menu-sidebar"><a href="{{ url('/Students') }}"><span class="fa fa-calendar-minus-o"></span> Daftar Siswa</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/Borrow_item') }}"><span class="fa fa-calendar-minus-o"></span> Pinjam Barang</span></a></li>
        

        <li class="menu-sidebar"><a href="{{ url('/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>