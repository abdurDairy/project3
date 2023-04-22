@extends('Admin.adminMaster')
@section('general-content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-header my-3" style="display:flex;">
                        <h1 style="font-weight:;font-size:15px;background:#075cbd;color:#fff;padding:5px 10px;display:block;border-radius:20px;">Result Upload Panel</h1>
                    </div>

                    {{-- *RESULT DETAILS* --}}
                    <div class="card-body">
                        <form action="{{ route('insert.result') }}" method="POST">
                            @csrf 

                            <div class="row p-5">
                                <div class="col-lg-6">
                                    <label for="semester"><strong>Select a Semester</strong> <span style="color:red;font-weight:bold;">*</span> </label>
                                        <select name="semester" id="semester" name="semester" class="form-control mb-2">
                                            <option value="" selected disabled>Select a Semester</option>

                                            @foreach ($allSemester as $semester)
                                                <option value="{{ $semester->id }}">{{ $semester->Semester }}</option>
                                            @endforeach
                                        </select>
                                        {{-- *ERROR MESSAGE SHOW* --}}
                                        @error('semester')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                </div>


                                <div class="col-lg-6">
                                    <label for="subject"><strong>Select a Subject</strong> <span style="color:red;font-weight:bold;">*</span></label>
                                    <select name="subject" id="subject" name="subject" class="form-control">
                                        <option value="" selected disabled>Select a Subject</option>
                                   
                                        @foreach ($allSubject as $subjectData)
                                            <option value="{{ $subjectData->routine_semester_id  }}">{{ $subjectData->Subject_Name  }}</option>
                                        @endforeach
                                    </select>
                                    {{-- *ERROR MESSAGE SHOW* --}}
                                    @error('subject')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- *CK EDITOR* --}}
                                <label class="mt-3" for="result_details"><strong>Make a result sheet</strong> <span style="color:red;font-weight:bold;">*</span></label>
                                <textarea name="result_details" id="result_details" cols="30" rows="10"></textarea>
                                {{-- *ERROR MESSAGE SHOW* --}}
                                @error('result_details')
                                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror


                                <button class="mt-2 btn btn-primary w-100 py-2 text-center text-color:light">Publish Result</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customJS')
    <script>
        $('#semester').on('change', function(){
          let SemesterCategory = $(this).val()
            // *AJAX START 
            $.ajax({
                url: `{{ route('select.subject') }}`,
                methos: 'GET',
                data:{
                    id: SemesterCategory
                },
                success: function(responce){
                   let Subjectdata = JSON.parse(responce)
                   let options = []; 

                   Subjectdata.forEach(subject => {
                      let optionElement = `<option value="${subject.id}">${subject.Subject_Name}</option>`
                      options.push(optionElement)
                   });
                   $('#subject').html(options)
                },
            });
        });
    </script>
@endpush

{{-- **CK EDITOR START --}}
@push('ckeditor')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>

<script>
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  CKEDITOR.ClassicEditor.create(document.getElementById('result_details'),{
      // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
      toolbar: {
          items: [
            'insertTable','exportPDF','exportWord', '|',
               '|',
              'heading', '|',
              'bold', 'italic', 'underline', 'subscript', 'superscript', '|',
              '|', 
              'undo', 'redo',
              '-',
              'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
              'alignment', '|',
              'link', 'insertImage', '|',
              'horizontalLine', 'pageBreak', '|',
       
         
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
      placeholder: 'make here a result sheet',
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