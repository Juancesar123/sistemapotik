
<li class="{{ Request::is('satuans*') ? 'active' : '' }}">
    <a href="{!! route('satuans.index') !!}"><i class="fa fa-edit"></i><span>Satuan</span></a>
</li>

<li class="{{ Request::is('dataobats*') ? 'active' : '' }}">
    <a href="{!! route('dataobats.index') !!}"><i class="fa fa-edit"></i><span>Data Obat</span></a>
</li>


<li class="{{ Request::is('transaksiObats*') ? 'active' : '' }}">
    <a href="{!! route('transaksiObats.index') !!}"><i class="fa fa-edit"></i><span>Transaksi Obat</span></a>
</li>

