@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            添加姓氏名字
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'nameSets.store']) !!}

                        @include('name_sets.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@include('name_sets.js')
