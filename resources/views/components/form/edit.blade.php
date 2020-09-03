@extends('cms::layouts.master')

@section('content')
    <div class="container">
        {!! Form::model($model, ['route' => ["cms.{$type}.update", $model->id]]) !!}
        @method('PUT')
        <div class="row">
            @include("cms::{$type}.form")
        </div>
        {!! Form::close() !!}
    </div>
@stop