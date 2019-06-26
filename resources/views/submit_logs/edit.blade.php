@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Submit Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($submitLog, ['route' => ['submitLogs.update', $submitLog->id], 'method' => 'patch']) !!}

                        @include('submit_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection