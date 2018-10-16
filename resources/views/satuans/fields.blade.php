<!-- Nama Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_satuan', 'Nama Satuan:') !!}
    {!! Form::text('nama_satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('satuans.index') !!}" class="btn btn-default">Cancel</a>
</div>
