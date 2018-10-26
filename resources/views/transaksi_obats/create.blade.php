@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transaksi Obat
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'transaksiObats.store']) !!}

                        @include('transaksi_obats.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-single').on('change',function(){
            $id = $('.js-example-basic-single').val();
            console.log($id);
            $.ajax({
                method:'GET',
                url:'/getspesific/'+$id,
                success:function(data){
                    data.forEach(function(element) {
                        $('#satuan1').val(element.nama_satuan);
                        $('#satuan').val(element.id_satuan);
                        $('#namaobat').val(element.nama_obat);
                    });
                    
                }
            })
        })
    });
</script>
@endsection