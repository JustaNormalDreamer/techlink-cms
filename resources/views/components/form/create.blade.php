@extends('cms::layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/techlink/cms/vendor/select2/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/techlink/cms/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/techlink/cms/vendor/select2/js/select2.min.js') }}"></script>
    <script>
        //tinymce
        var editor_config = {
            path_absolute : "/v1/dashboard/",
            branding: false,
            selector: ".textarea-description",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table  directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media visualblocks",
            relative_urls: false,
            visualblocks_default_state: true,
            file_picker_callback: function (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                let type = 'image' === meta.filetype ? 'Images' : 'Files',
                    url  = editor_config.path_absolute + 'filemanager?editor=tinymce5&type=' + type;

                tinymce.activeEditor.windowManager.openUrl({
                    url : url,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endpush

@section('content')
    <div class="container">
        {!! Form::open(['route' => "cms.{$type}.store", 'method' => 'POST' ]) !!}
        <div class="row">
            @include("cms::{$type}.form")
        </div>
        {!! Form::close() !!}
    </div>
@stop