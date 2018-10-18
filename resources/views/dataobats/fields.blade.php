<!-- Nama Obat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_obat', 'Nama Obat:') !!}
    {!! Form::text('nama_obat', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Satuan', 'Satuan:') !!}
    <select class="form-control" name="id_satuan">
    @foreach($datasatuan as $key)
        <option value="{{$key->id}}">{{$key->nama_satuan}}</option>
    @endforeach
    </select>
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::text('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataobats.index') !!}" class="btn btn-default">Cancel</a>
</div>
