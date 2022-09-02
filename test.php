<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CKEditor 5 – CKBox sample</title>
    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h1>CKEditor 5 – CKBox sample</h1>
<?php
include './config/connection.php';
//update text area data to content task_description where id  = 1 when submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE content SET task_description = '" . $_POST["task_description"] . "' WHERE id = 1";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}

?>

<form action="" method="post">
    <div id="container">
        <div id="editor" aria-readonly="gc_disable">
            <textarea readonly name="task_description" cols="30" rows="10"></textarea>
        </div>
    </div>
    <input type="submit" value="Submit">
    </form>
    <script src="https://cdn.ckbox.io/CKBox/1.1.0/ckbox.js"></script>
    <!--
        The "super-build" of CKEditor 5 served via CDN contains a large set of plugins and multiple editor types.
        See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
    -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>
    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'ckbox', 'uploadImage', '|',
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
                    'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
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
            placeholder: 'Welcome to CKEditor 5 + CKBox!',
            ckbox: {
                // The development token endpoint is a special endpoint to help you in getting started with
                // CKEditor Cloud Services.
                // Please note the development token endpoint returns tokens with the CKBox administrator role.
                // It offers unrestricted, full access to the service and will expire 30 days after being used for the first time.
                // -------------------------------------------------------------
                // !!! You should not use it on production !!!
                // -------------------------------------------------------------
                // Read more: https://ckeditor.com/docs/ckbox/latest/guides/configuration/authentication.html#token-endpoint

                // You need to provide your own token endpoint here
                tokenUrl: 'https://91986.cke-cs.com/token/dev/Lrs1ultYZbQc8bxEMqACq1IrucwZxYOhgdsU?limit=10'
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you reqd the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'EasyImage',
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
</body>
</html>
