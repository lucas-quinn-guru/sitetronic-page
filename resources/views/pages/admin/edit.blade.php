@extends('layouts.default.master')

@section('titlePage', 'Edit Post')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h1>Edit Post</h1>
            <hr>
                {{ Form::model($post, [ 'route' => [ 'admin.posts.update', $post->id], 'method' => 'PUT'] ) }}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

                    {{ Form::label('body', 'Post Body') }}
                    {{ Form::textarea('body', null, array('class' => 'form-control', "id" => "basic-example")) }}<br>

                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                </div>
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
        toolbar: 'undo redo | customMediaButton | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ],
        valid_elements : 'stream[src|controls],a[href|target=_blank],strong/b,div[align],br',
        extended_valid_elements: 'stream[src|controls]',


        setup: function (editor) {

            editor.ui.registry.addButton('customMediaButton', {
                text: 'My Media',
                onAction: function (_) {
                    editor.insertContent('^^autonettv media="2e7888be174a83438be57872906640d9"^^');
                }
            });
        }
    });
@endpush

@push("jscript_src")
<script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://embed.videodelivery.net/embed/r4xu.fla9.latest.js?video=2e7888be174a83438be57872906640d9"></script>
@endpush
