<?php
$files = [];
if (isset($_POST['submit'])){
    if (count($_FILES['fichier']['name']) > 0) {
        for($i=0;$i<count($_FILES ['fichier']['name']); $i++) {
            $tmpFilePath = $_FILES['fichier']['tmp_name']['$i'];

            if($tmpFilePath != ""){
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "/upload/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    var_dump($files);
                }else{
                    echo 'upload failed !';
                }
            }
        }
    }
}
var_dump($_POST, $_FILES);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de fichier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form class="form-controls" action="" method="post" enctype="multipart/form-data">
        <div class="custom-file">
            <label class="custom-file-label" for="upload_file">Choississez un ou plusieurs fichiers !</label>
            <input class="custom-file-input" type="file" name="fichier[]" multiple="multiple" id="upload_file"/>
            <input class="btn btn-primary" type="submit" value="Upload" />
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
