@extends('admin.layouts.app')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-quill-editor.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/page-blog.min.css">

<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
<style>
    .ql-snow .ql-editor h3 {
        font-size: 2em;
    }
    #blog-editor-container{
        height:100%;
    }
    .editor,.ql-editor{
        min-height:300px;
    }
</style>
<!-- END: Vendor CSS-->
@endsection
@section('title','Edit Journal')
@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('admin.journal.update',$journal->slug) }}" method="POST" class="mt-2" id="blog-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group mb-2">
                                    <label for="blog-edit-title">Title</label>
                                    <input required name="name" type="text" id="blog-edit-title" class="form-control"
                                        value="{{$journal->name}}" />
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group mb-2">
                                    <label for="blog-edit-title">Slug</label>
                                    <input required name="slug" type="text" id="blog-edit-slug" class="form-control"
                                        value="{{$journal->slug}}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <label>Content</label>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container">
                                            <div id="toolbar">
                                                <div class="ql-formats">
                                                    <select class="ql-header">
                                                        <option value="3">Subtitle</option>
                                                        <option selected="selected">Normal text</option>
                                                    </select>
                                                    <button class="ql-clean"></button>
                                                </div>
                                                <span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button><button type="button" class="ql-underline"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button><button type="button" class="ql-strike"><svg viewBox="0 0 18 18"> <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"></line> <path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"></path> <path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"></path> </svg></button></span>
                                                <span class="ql-formats"><button type="button" class="ql-list" value="ordered"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button><button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button><button type="button" class="ql-indent" value="-1"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line> <polyline class="ql-stroke" points="5 7 5 11 3 9 5 7"></polyline> </svg></button><button type="button" class="ql-indent" value="+1"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"></line> <polyline class="ql-fill ql-stroke" points="3 7 3 11 5 9 3 7"></polyline> </svg></button></span>  
                                                <span class="ql-formats">
                                                    <span class="ql-formats">
                                                        <button class="ql-align" value=""></button>
                                                        <button class="ql-align" value="center"></button>
                                                        <button class="ql-align" value="right"></button>
                                                        <button class="ql-align" value="justify"></button>
                                                    </span>
                                                </span>
                                                <span class="ql-formats"><button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button><button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button><button type="button" class="ql-video"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="12" width="12" x="3" y="3"></rect> <rect class="ql-fill" height="12" width="1" x="5" y="3"></rect> <rect class="ql-fill" height="12" width="1" x="12" y="3"></rect> <rect class="ql-fill" height="2" width="8" x="5" y="8"></rect> <rect class="ql-fill" height="1" width="3" x="3" y="5"></rect> <rect class="ql-fill" height="1" width="3" x="3" y="7"></rect> <rect class="ql-fill" height="1" width="3" x="3" y="10"></rect> <rect class="ql-fill" height="1" width="3" x="3" y="12"></rect> <rect class="ql-fill" height="1" width="3" x="12" y="5"></rect> <rect class="ql-fill" height="1" width="3" x="12" y="7"></rect> <rect class="ql-fill" height="1" width="3" x="12" y="10"></rect> <rect class="ql-fill" height="1" width="3" x="12" y="12"></rect> </svg></button></span>
                                            </div>
                                            <div class="editor">
                                                {!! $journal->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <textarea id="content" name="content" style="display:none" required></textarea>
                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">Featured Image</h4>
                                    <div class="media flex-column flex-md-row">
                                        <img src="{{ $journal->image }}" id="blog-feature-image"
                                            class="rounded mr-2 mb-1 mb-md-0" width="170" height="110"
                                            alt="Blog Featured Image" />
                                        <div class="media-body">
                                            <p class="my-50">
                                                <a href="javascript:void(0);"
                                                    id="blog-image-text">C:\fakepath\banner.jpg</a>
                                            </p>
                                            <div class="d-inline-block">
                                                <div class="form-group mb-0">
                                                    <div class="custom-file">
                                                        <input name="image" type="file" class="custom-file-input" id="blogCustomFile"
                                                            accept="image/*" />
                                                        <label class="custom-file-label" for="blogCustomFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group mb-2">
                                    <label for="blog-edit-title">Summary</label>
                                    <textarea name="summary" class="form-control" required>{{$journal->summary}}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <button id="submit" type="submit" class="btn btn-primary mr-1">Save Changes</button>
                            </div>
                        </div>
                    </form>
                    <!--/ Form -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="/app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="/app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="/app-assets/vendors/js/editors/quill/image-resize.min.js"></script>
<script>
    var editor = '#blog-editor-container .editor';
    var blogFeatureImage = $('#blog-feature-image');
    var blogImageText = document.getElementById('blog-image-text');
    var blogImageInput = $('#blogCustomFile');

    var blogEditor = new Quill(editor, {
        bounds: editor,
        modules: {
            imageResize: {
                displaySize: true
            },
            formula: true,
            syntax: true,
            toolbar: {
                container: '#toolbar',
                handlers: { image: quill_img_handler },
            },
        },
        theme: 'snow'
    });
    
    function quill_img_handler() {
        let fileInput = this.container.querySelector('input.ql-image[type=file]');
    
        if (fileInput == null) {
            fileInput = document.createElement('input');
            fileInput.setAttribute('type', 'file');
            fileInput.setAttribute('accept', 'image/png, image/gif, image/jpeg, image/bmp, image/x-icon');
            fileInput.classList.add('ql-image');
            fileInput.addEventListener('change', () => {
                const files = fileInput.files;
                const range = this.quill.getSelection(true);
    
                if (!files || !files.length) {
                    console.log('No files selected');
                    return;
                }
    
                startAjaxLoader();
                const formData = new FormData();
                formData.append('file', files[0]);
                if(files[0].size <= 500000){
                    this.quill.enable(false);
                    var that = this;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('admin.journal.image')}}",
                        type: "post",
                        data: formData,
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(data){
                            that.quill.enable(true);
                            that.quill.editor.insertEmbed(range.index, 'image', data.url_path);
                            that.quill.setSelection(range.index + 1, Quill.sources.SILENT);
                            fileInput.value = '';
                            stopAjaxLoader()
                        }
                    });
                }else{
                    toastr.error('Maksimal File size 500kb', 'Error!', {
                        closeButton: true,
                        tapToDismiss: false
                    });
                }
                
            });
            this.container.appendChild(fileInput);
        }
        fileInput.click();
    }

    // Change featured image
    if (blogImageInput.length) {
        $(blogImageInput).on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (blogFeatureImage.length) {
                    blogFeatureImage.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
            blogImageText.innerHTML = blogImageInput.val();
        });
    }

    $(document).ready(function(){
        $("#submit").on("click", function () {
            var hvalue = $('.ql-editor').html();
            $('#content').text(hvalue);
        });
    });

</script>
@endsection
