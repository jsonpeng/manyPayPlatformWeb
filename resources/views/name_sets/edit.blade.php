@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            编辑姓氏名字
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nameSet, ['route' => ['nameSets.update', $nameSet->id], 'method' => 'patch']) !!}

                        @include('name_sets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@include('name_sets.js')