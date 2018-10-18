<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $transaksiObat->id !!}</p>
</div>

<!-- Kd Obat Field -->
<div class="form-group">
    {!! Form::label('kd_obat', 'Kd Obat:') !!}
    <p>{!! $transaksiObat->kd_obat !!}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{!! $transaksiObat->qty !!}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{!! $transaksiObat->satuan !!}</p>
</div>

<!-- Total Harga Field -->
<div class="form-group">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <p>{!! $transaksiObat->total_harga !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $transaksiObat->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $transaksiObat->updated_at !!}</p>
</div>

