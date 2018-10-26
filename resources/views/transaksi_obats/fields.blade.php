<!-- Kd Obat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kd_obat', 'Kd Obat:') !!}
    <select class="js-example-basic-single form-control" name="kd_obat" id="kd_obat">
        @foreach($dataobat as $obat)
            <option value="{{$obat->id}}">{{$obat->kode_obat}}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('Nama Obat', 'Nama Obat:') !!}
    <input class="form-control" id="namaobat"  disabled>
</div>
<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::text('qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan', 'Satuan:') !!}
    <input class="form-control" id="satuan1" name="satuan1" disabled>
    <input class="form-control" id="satuan" name="satuan"  type="hidden">
</div>


<!-- Total Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    {!! Form::text('total_harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transaksiObats.index') !!}" class="btn btn-default">Cancel</a>
</div>
