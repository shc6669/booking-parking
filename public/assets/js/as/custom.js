/* Datepicker Plugins*/
$('#blog_date').datepicker({
    orientation: 'bottom',
    todayHighlight: true,
    startView: 'years',
    format: 'yyyy-mm-dd'
});
$('#date_start').datepicker({
    orientation: 'bottom',
    todayHighlight: true,
    startView: 'years',
    format: 'yyyy-mm-dd'
});
$('#date_end').datepicker({
    orientation: 'bottom',
    todayHighlight: true,
    startView: 'years',
    format: 'yyyy-mm-dd'
});
$('#publish_date').datepicker({
    orientation: 'bottom',
    todayHighlight: true,
    startView: 'years',
    format: 'yyyy-mm-dd'
});

/* FileInput Plugins*/
$("#header").fileinput({
    allowedFileExtensions: ["jpg", "jpeg", "png"],
    browseOnZoneClick: true,
    showUpload: false,
    showClose: false,
    autoReplace: true,
    maxFileCount: 1,
    theme: 'fas',
    language: 'en'
});
$("#thumb").fileinput({
    allowedFileExtensions: ["jpg", "jpeg", "png"],
    browseOnZoneClick: true,
    showUpload: false,
    showClose: false,
    autoReplace: true,
    maxFileCount: 1,
    theme: 'fas',
    language: 'en'
});

/* TinyMCE Plugins */
var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    height: 300,
    plugin_preview_width: 1000,
    code_dialog_width: 1000,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | preview fullscreen",
    hidden_input: false,
    paste_as_text: true,
    relative_urls: false,
    fullscreen_native: true,
    file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
        if(type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        }
        else {
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

/* Select2 Plugins */
$("select").select2({"allowClear":true,"placeholder":{"id":"","text":"Please Select Option"}});
$("#author, #categories, #country, #languages, #themes, #users").select2({"allowClear":true,"placeholder":{"id":"","text":"You can select more than one options"}});
$("#clients, #project, #project_attachment_type, #publication_type, #services, #services_link, #types, #user, #positions").select2({"allowClear":true,"placeholder":{"id":"","text":"Please Select Option"}});