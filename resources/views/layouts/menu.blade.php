

<li class="treeview">
    <a href="#">
        <i class="fa fa-database"></i>
        <span>Master Data</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('satuans*') ? 'active' : '' }}">
            <a href="{!! route('satuans.index') !!}"><i class="fa fa-edit"></i><span>Satuan</span></a>
        </li>                
        <li class="{{ Request::is('dataobats*') ? 'active' : '' }}">
            <a href="{!! route('dataobats.index') !!}"><i class="fa fa-edit"></i><span>Data Obat</span></a>
        </li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-cart-plus"></i>
        <span>Transaksi</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('transaksiObats*') ? 'active' : '' }}">
            <a href="{!! route('transaksiObats.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Obat</span></a>
        </li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Laporan</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('reportpenjualan*') ? 'active' : '' }}">
            <a href="{!! route('reportpenjualan.index') !!}"><i class="fa fa-circle-o"></i><span>Laporan Penjualan</span></a>
        </li>
    </ul>
</li>