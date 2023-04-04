@extends('Admin.adminMaster')

@push('summernoteCSS')
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush


@push('bootstrapCSS')
       {{-- BOOTSTRAP CSS --}}
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush


@section('general-content')
   <div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card" style="border-radius: 10px;
            /* background: #e0e0e0; */
            box-shadow:  20px 20px 60px #efccf0,
                         -20px -20px 60px #efcff0;">
                <div style="background: #6a23ee;" class="card-header text-light position-absolute top-0 end-0">
                    <h1 style="font-weight:bold;">Teacher Information</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.edit.data', $data->id) }}" method="POST" enctype="multipart/form-data" class="px-5">
                        @csrf
                        @method('PUT')
                        <label for="teacher_name" style="color:black;font-weight:bold;">Teacher Name <span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->teacher_name }}" name="teacher_name" id="teacher_name" type="text" class="form-control my-2" placeholder="donor name..">
                        @if ($errors->has('teacher_name'))
                           <strong class="text-danger">{{ $errors->first('teacher_name') }}</strong> <br> <br>
                        @endif


                        <label for="teacher_designetion" style="color:black;font-weight:bold;">Designation<span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->teacher_designetion }}" name="teacher_designetion" id="teacher_designetion" type="text" class="form-control my-2" placeholder="donor department name..">
                        @if ($errors->has('teacher_designetion'))
                           <strong class="text-danger">{{ $errors->first('teacher_designetion') }}</strong> <br> <br>
                        @endif

                        
                        <label for="accademic_profile" style="color:black;font-weight:bold;">Accademic Profile<span style="color:red;font-weight:bold;">*</span></label>
                        <textarea name="accademic_profile" id="accademic_profile" cols="30" rows="10" class="form-control">{!! $data->accademic_profile !!}</textarea>
                        @if ($errors->has('accademic_profile'))
                          <strong class="text-danger">{{ $errors->first('accademic_profile') }}</strong> <br> <br>
                        @endif


                        <label for="biography" style="color:black;font-weight:bold;">Your Biography<span style="color:red;font-weight:bold;">*</span></label>
                        <textarea name="biography" id="biography" cols="30" rows="10" class="form-control">{!! $data->biography !!}</textarea>
                        @if ($errors->has('biography'))
                           <strong class="text-danger">{{ $errors->first('biography') }}</strong> <br> <br>
                        @endif


                        <label for="research_areas" style="color:black;font-weight:bold;">Your Reasearch Area<span style="color:red;font-weight:bold;">*</span></label>
                        {{-- <input name="research_areas" id="research_areas" type="text" class="form-control my-2" placeholder="insert your research areas"> --}}
                        <textarea name="research_areas" id="research_areas" cols="30" rows="10" class="form-control">{!! $data->research_areas !!}</textarea>
                        @if ($errors->has('research_areas'))
                           <strong class="text-danger">{{ $errors->first('research_areas') }}</strong> <br> <br>
                        @endif


                        <label for="teaching_subject" style="color:black;font-weight:bold;">Your teaching subject list<span style="color:red;font-weight:bold;">*</span></label>
                        <textarea name="teaching_subject" id="teaching_subject" cols="30" rows="10" class="form-control">{!! $data->teaching_subject !!}</textarea>
                        @if ($errors->has('teaching_subject'))
                           <strong class="text-danger">{{ $errors->first('teaching_subject') }}</strong> <br> <br>
                        @endif

                        <label for="teacher_image" style="color:black;font-weight:bold;">Your Image<span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->teacher_image }}" name="teacher_image" id="teacher_image" type="file" class="form-control my-2">
                        @if ($errors->has('teacher_image'))
                          <strong class="text-danger">{{ $errors->first('teacher_image') }}</strong> <br> <br>
                        @endif


                        <label for="teacher_phone" style="color:black;font-weight:bold;">contact number<span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->teacher_phone }}"  name="teacher_phone" id="teacher_phone" type="number" class="form-control my-2" placeholder="insert your phone number">
                        @if ($errors->has('teacher_phone'))
                          <strong class="text-danger">{{ $errors->first('teacher_phone') }}</strong> <br> <br>
                        @endif


                        <label for="teacher_email" style="color:black;font-weight:bold;">Your Email<span style="color:red;font-weight:bold;">*</label>
                        <input value="{{ $data->teacher_email }}" name="teacher_email" id="teacher_email" type="email" class="form-control my-2" placeholder="insert your phone number">
                        @if ($errors->has('teacher_email'))
                          <strong class="text-danger">{{ $errors->first('teacher_email') }}</strong> <br> <br>
                        @endif

                        
                        <label for="teacher_facebook" style="color:black;font-weight:bold;">Your FaceBook Link</label>
                        <input value="{{ $data->teacher_facebook }}" name="teacher_facebook" id="teacher_facebook" type="text" class="form-control my-2" placeholder="insert your Facebook Profile Link">
                        
                        <label for="teacher_youtube" style="color:black;font-weight:bold;">Your YouTube Profile Link</label>
                        <input value="{{ $data->teacher_youtube }}" name="teacher_youtube" id="teacher_youtube" type="text" class="form-control my-2" placeholder="insert your YouTube Profile Link">
                        
                        <label for="teacher_linkedin" style="color:black;font-weight:bold;">Your Linkedin Profile Link</label>
                        <input value="{{ $data->teacher_linkedin }}" name="teacher_linkedin" id="teacher_linkedin" type="text" class="form-control my-2" placeholder="insert your Linkedin Profile Link">
                        
                        <button class="btn btn-primary w-100 my-2" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection

{{-- BOOTSTRAP JS --}}
@push('bootstrapJS')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush





{{-- **CK EDITOR START --}}
@push('ckeditor')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>

<script>
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  CKEDITOR.ClassicEditor.create(document.getElementById('accademic_profile'),{
      // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
      toolbar: {
          items: [
              'exportPDF','exportWord', '|',
              'findAndReplace', 'selectAll', '|',
              'heading', '|',
              'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
              'bulletedList', 'numberedList', 'todoList', '|',
              'outdent', 'indent', '|',
              'undo', 'redo',
              '-',
              'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
              'alignment', '|',
              'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
              'specialCharacters', 'horizontalLine', 'pageBreak', '|',
              'textPartLanguage', '|',
              'sourceEditing'
          ],
          shouldNotGroupWhenFull: true
      },
      // Changing the language of the interface requires loading the language file using the <script> tag.
      // language: 'es',
      list: {
          properties: {
              styles: true,
              startIndex: true,
              reversed: true
          }
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
      heading: {
          options: [
              { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
              { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
              { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
              { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
              { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
              { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
              { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
          ]
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
      placeholder: 'Welcome to CKEditor 5!',
      // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
      fontFamily: {
          options: [
              'default',
              'Arial, Helvetica, sans-serif',
              'Courier New, Courier, monospace',
              'Georgia, serif',
              'Lucida Sans Unicode, Lucida Grande, sans-serif',
              'Tahoma, Geneva, sans-serif',
              'Times New Roman, Times, serif',
              'Trebuchet MS, Helvetica, sans-serif',
              'Verdana, Geneva, sans-serif'
          ],
          supportAllValues: true
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
      fontSize: {
          options: [ 10, 12, 14, 'default', 18, 20, 22 ],
          supportAllValues: true
      },
      // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
      // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
      htmlSupport: {
          allow: [
              {
                  name: /.*/,
                  attributes: true,
                  classes: true,
                  styles: true
              }
          ]
      },
      // Be careful with enabling previews
      // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
      htmlEmbed: {
          showPreviews: true
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
      link: {
          decorators: {
              addTargetToExternalLinks: true,
              defaultProtocol: 'https://',
              toggleDownloadable: {
                  mode: 'manual',
                  label: 'Downloadable',
                  attributes: {
                      download: 'file'
                  }
              }
          }
      },
      // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
      mention: {
          feeds: [
              {
                  marker: '@',
                  feed: [
                      '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                      '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                      '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                      '@sugar', '@sweet', '@topping', '@wafer'
                  ],
                  minimumCharacters: 1
              }
          ]
      },
      // The "super-build" contains more premium features that require additional configuration, disable them below.
      // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
      removePlugins: [
          // These two are commercial, but you can try them out without registering to a trial.
          // 'ExportPdf',
          // 'ExportWord',
          'CKBox',
          'CKFinder',
          'EasyImage',
          // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
          // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
          // Storing images as Base64 is usually a very bad idea.
          // Replace it on production website with other solutions:
          // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
          // 'Base64UploadAdapter',
          'RealTimeCollaborativeComments',
          'RealTimeCollaborativeTrackChanges',
          'RealTimeCollaborativeRevisionHistory',
          'PresenceList',
          'Comments',
          'TrackChanges',
          'TrackChangesData',
          'RevisionHistory',
          'Pagination',
          'WProofreader',
          // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
          // from a local file system (file://) - load this site via HTTP server if you enable MathType
          'MathType'
      ]
  });
</script>
@endpush
{{-- **CK EDITOR END --}}









{{-- @push('summernoteJS')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#accademic_profile, #biography , #teaching_subject, #research_areas').summernote({
      placeholder: 'Insert Your Accademic Profile..',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['font', ['bold', 'underline']],
        ['color', ['color']],
        ['table', ['table']],
        ['insert', ['link']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['codeview']]
      ]
    });

  </script>
@endpush --}}