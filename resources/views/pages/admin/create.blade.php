@extends('layouts.default.master')

@section('titlePage', 'Create New Post')

@section('content')
<div class="container">
    <h1>
        <i class='fa fa-user-plus'></i> Add Blog Post
    </h1>
    <hr>
    <div class='col-lg-12'>

        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'posts.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('body', 'Post Body') }}

            {{ Form::textarea('body', null, [ 'class' => 'form-control', "id" => "basic-example" ] ) }}
            <br>

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@push('jscript_footer')
    tinymce.init({
        selector: 'textarea#basic-example',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | customDateButton | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ],
        valid_elements : 'stream[src|controls],a[href|target=_blank],strong/b,div[align],br',
        extended_valid_elements: 'stream[src|controls]',
        setup: function (editor) {
            var toTimeHtml = function (date) {
                return '<time datetime="' + date.toString() + '">' + date.toDateString() + '</time>';
            };

            editor.addButton('customDateButton', {
                text: 'Stream',
                icon: false,
                tooltip: 'Insert Current Date',
                disabled: false,
                onclick: function () {
                    date = new Date();
                    editor.insertContent(date.now() + '<stream src="2e7888be174a83438be57872906640d9" controls></stream>');
                }
            });
        }
    });
@endpush

@push("jscript_src")
<script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://embed.videodelivery.net/embed/r4xu.fla9.latest.js?video=2e7888be174a83438be57872906640d9"></script>
@endpush
