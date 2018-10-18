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
                   {!! Form::model($transaksiObat, ['route' => ['transaksiObats.update', $transaksiObat->id], 'method' => 'patch']) !!}

                        @include('transaksi_obats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection