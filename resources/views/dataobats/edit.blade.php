@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Obat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataobat, ['route' => ['dataobats.update', $dataobat->id], 'method' => 'patch']) !!}

                        @include('dataobats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection