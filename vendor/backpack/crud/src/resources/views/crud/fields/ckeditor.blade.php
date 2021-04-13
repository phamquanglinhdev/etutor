<!-- CKeditor -->
@php
    $field['extra_plugins'] = isset($field['extra_plugins']) ? implode(',', $field['extra_plugins']) : "embed,widget";

    $defaultOptions = [
        "filebrowserBrowseUrl" => backpack_url('elfinder/ckeditor'),
        "extraPlugins" => $field['extra_plugins'],
        "embed_provider" => "//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}",
    ];

    $field['options'] = array_merge($defaultOptions, $field['options'] ?? []);
@endphp

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')
    <textarea
        name="{{ $field['name'] }}"
        data-init-function="bpFieldInitCKEditorElement"
        data-options="{{ trim(json_encode($field['options'])) }}"
        @include('crud::fields.inc.attributes', ['default_class' => 'form-control'])
    	>{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}</textarea>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script src="{{asset('packages/ckeditor4/ckeditor.js')}}"></script>
{{--        <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>--}}
                <script src="{{ asset('packages/ckeditor4/adapters/jquery.js') }}"></script>
        <script>
            a = document.getElementsByTagName('textarea');
            for(i=0;i<a.length;i++){
                a[i].id = i;
                CKEDITOR.replace(i.toString(),{
                    extraPlugins: 'embed,autoembed,image2',
                    height: 500,

                    // Load the default contents.css file plus customizations for this sample.
                    contentsCss: [
                        'http://cdn.ckeditor.com/4.16.0/full-all/contents.css',
                        'https://ckeditor.com/docs/ckeditor4/4.16.0/examples/assets/css/widgetstyles.css'
                    ],
                    // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
                    embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

                    // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
                    // resizer (because image size is controlled by widget styles or the image takes maximum
                    // 100% of the editor width).
                    image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
                    image2_disableResizer: true,

                    filebrowserBrowseUrl: '/admin/elfinder#elf_l1_Lw',
                    filebrowserImageBrowseUrl: '/admin/elfinder#elf_l1_Lw',
                    filebrowserUploadUrl: '/uploads',
                    filebrowserImageUploadUrl: '/uploads'
                });
            }
            // $('textarea').attr('id','editor').each(
            //     CKEDITOR.replace( 'editor' )
            // )
            // DecoupledEditor
            //     .create( document.querySelector( 'textarea' ) )
            //     .then( editor => {
            //         const toolbarContainer = document.querySelector( '#toolbar-container' );
            //
            //         toolbarContainer.appendChild( editor.ui.view.toolbar.element );
            //     } )
            //     .catch( error => {
            //         console.error( error );
            //     } );
            // function bpFieldInitCKEditorElement(element) {


                //when removing ckeditor field from page html the instance is not properly deleted.
                //this event is triggered in repeatable on deletion so this field can intercept it
                //and properly delete the instances so it don't throw errors of unexistent elements in page that has initialized ck instances.
                // element.on('backpack_field.deleted', function(e) {
                //     $ck_instance_name = element.siblings("[id^='cke_editor']").attr('id');
                //
                //     //if the instance name starts with cke_ it was an auto-generated name from ckeditor
                //     //that happens because in repeatable we stripe the field names used by ckeditor, so it renders a random name
                //     //that starts with cke_
                //     if($ck_instance_name.startsWith('cke_')) {
                //         $ck_instance_name = $ck_instance_name.substr(4);
                //     }
                //     //we fully destroy the instance when element is deleted from the page.
                //     CKEDITOR.instances[$ck_instance_name].destroy(true);
                // });
                // // trigger a new CKEditor
                // element.ckeditor(element.data('options'));
            // }
        </script>
    @endpush

@endif

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
