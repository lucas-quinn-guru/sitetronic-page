@extends('layouts.default.master')

@section('title', 'Create New Page')

@section('content')
<div class="container">
    <h2>
        <i class='fa fa-user-plus'></i> Add Page
    </h2>
    <hr>
    <div class='col-lg-12'>

        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'admin.pages.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('content', 'Page Content') }}

            {{ Form::textarea('content', null, [ 'class' => 'form-control', "id" => "basic-example" ] ) }}
            <br>

            {{ Form::submit('Create Page', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@push('jscript_footer')
    var editor_config = {
    path_absolute : "{{env("APP_URL")}}/",
        selector: 'textarea#basic-example',
        height: 500,
        menubar: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        //"advlist autolink lists link image charmap print preview hr anchor pagebreak",
        //"searchreplace wordcount visualblocks visualchars code fullscreen",
        //"insertdatetime media nonbreaking save table contextmenu directionality",
        //"emoticons template paste textcolor colorpicker textpattern"
        toolbar: 'insertfile undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code | link image media | help',
        relative_urls: false,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ],
        valid_elements : 'stream[src|controls],img[src|alt|width|height|border|style],a[href|target=_blank],strong/b,div[align],br',
        extended_valid_elements: 'stream[src|controls]',
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
@endpush

@push("jscript_src")
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://embed.videodelivery.net/embed/r4xu.fla9.latest.js?video=2e7888be174a83438be57872906640d9"></script>
@endpush
