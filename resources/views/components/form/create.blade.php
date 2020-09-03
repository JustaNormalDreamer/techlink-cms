@extends('cms::layouts.master')

@section('content')
    <div class="container">
        {!! Form::open(['route' => "cms.{$type}.store", 'method' => 'POST' ]) !!}
        <div class="row">
            @include("cms::{$type}.form")
        </div>
        {!! Form::close() !!}
    </div>
@stop