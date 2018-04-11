<?php
require '../UploadController.php';


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
                <label  for="upload_file"></label>
                <input  type="file" name="upload[]" multiple="multiple" id="upload_file"/>
                <input class="btn btn-primary" type="submit" name="submit" value="Upload" />
        </form>


<?php if (isset($_POST['submit'])): ?>
    <?php if (empty($_FILES['name'])):?>
        <p class="text-danger   ">Aucun fichier envoyé</p>


<!--//    $numberFiles = count($_FILES['upload']['name']);-->
<!--//    $verif = new UploadController($_FILES['upload']['name'][0]);-->
<!--//-->
<!--//    if($numberFiles > 0) {-->
<!--//        for($i=0; $i<$numberFiles; $i++) {-->
<!--//            //Save the name-->
<!--//            $nameFile = $_FILES['upload']['name'][$i];-->
<!--//            $checkFile = new UploadController($nameFile);-->
<!--//-->
<!--//-->
<!--//        }-->
    <?php endif; ?>
<?php endif; ?>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
