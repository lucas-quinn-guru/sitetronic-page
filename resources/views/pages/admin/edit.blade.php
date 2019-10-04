@extends('layouts.default.master')

@section('title', 'Edit Page')

@push('css_inline')

@endpush

@section('content')
<div class="container">
    {{ Breadcrumbs::render('sitetronic-pages-admin-edit') }}
    <h2>
        <i class='fa fa-user-plus'></i> Edit Page
    </h2>
    <hr>

    <div class='col-lg-12'>
        {{ Form::model($page, [ 'route' => [ 'admin.pages.update', $page->id], 'method' => 'PUT'] ) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Page Content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control', "id" => "basic-example")) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>


@endsection

@push('jscript_footer')
    var editor_config = {
    path_absolute : "{{env("APP_URL")}}/",
        selector: 'textarea#basic-example',
        content_style: 'img { margin: 10px; }',
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
        valid_elements : "@[id|class|style|title|dir<ltr?rtl|lang|xml::lang|onclick|ondblclick|"
        + "onmousedown|onmouseup|onmouseover|onmousemove|onmouseout|onkeypress|"
        + "onkeydown|onkeyup],a[rel|rev|charset|hreflang|tabindex|accesskey|type|"
        + "name|href|target|title|class|onfocus|onblur],strong/b,em/i,strike,u,"
        + "#p,-ol[type|compact],-ul[type|compact],-li,br,img[longdesc|usemap|"
        + "src|border|alt=|title|hspace|vspace|width|height|align],-sub,-sup,"
        + "-blockquote,-table[border=0|cellspacing|cellpadding|width|frame|rules|"
        + "height|align|summary|bgcolor|background|bordercolor],-tr[rowspan|width|"
        + "height|align|valign|bgcolor|background|bordercolor],tbody,thead,tfoot,"
        + "#td[colspan|rowspan|width|height|align|valign|bgcolor|background|bordercolor"
        + "|scope],#th[colspan|rowspan|width|height|align|valign|scope],caption,-div,"
        + "-span,-code,-pre,address,-h1,-h2,-h3,-h4,-h5,-h6,hr[size|noshade],-font[face"
        + "|size|color],dd,dl,dt,cite,abbr,acronym,del[datetime|cite],ins[datetime|cite],"
        + "object[classid|width|height|codebase|*],param[name|value|_value],embed[type|width"
        + "|height|src|*],script[src|type],map[name],area[shape|coords|href|alt|target],bdo,"
        + "button,col[align|char|charoff|span|valign|width],colgroup[align|char|charoff|span|"
        + "valign|width],dfn,fieldset,form[action|accept|accept-charset|enctype|method],"
        + "input[accept|alt|checked|disabled|maxlength|name|readonly|size|src|type|value],"
        + "kbd,label[for],legend,noscript,optgroup[label|disabled],option[disabled|label|selected|value],"
        + "q[cite],samp,select[disabled|multiple|name|size],small,"
        + "textarea[cols|rows|disabled|name|readonly],tt,var,big",
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
