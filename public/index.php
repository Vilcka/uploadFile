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
        <h1 class="text-center mt-4 mb-4">Upload De fichier !!!</h1>
        <form class="d-flex justify-content-center form-controls" action="" method="post" enctype="multipart/form-data">
                <label  for="upload_file"></label>
                <input  type="file" name="upload[]" multiple="multiple" id="upload_file"/>
            <input class="btn btn-primary" type="submit" name="submit" value="Upload" />
        </form>


<?php
// Si l'upload est lancé ..
if (isset($_POST['submit'])) {
    //.. et si des fichier sont bien présent
    if (!empty($_FILES['upload']['name'])) {
        $uploadController = new UploadController();
        //init des variables
        $filesName = $_FILES['upload']['name'];
        $filesType = $_FILES['upload']['type'];
        $filesSize = $_FILES['upload']['size'];
        $filesTmp = $_FILES['upload']['tmp_name'];
        $filesErrors = $_FILES['upload']['error'];
        $numberFiles = count($_FILES['upload']['name']);

        for($i=0;$i<$numberFiles; $i ++) {
            //Si il ny'a pas d'erreur, que le fichier a la bonne extension et est de la bonne taille
            if($filesErrors[$i] !== 0) {
                echo '<div class="alert alert-danger" role="alert">
                        <p>Erreur lors de l\'upload !</p>
                      </div>';
            }
            if(!$uploadController->checkExtension($filesType[$i], $filesName[$i])) {
                echo '<div class="alert alert-danger" role="alert">
                        <p>Le fichier '. $filesName[$i] . ' n\'est pas une image !</p>
                      </div>';
            }elseif(!$uploadController->checkSize($filesSize[$i])) {
                echo '<div class="alert alert-danger" role="alert">
                        <p>Le fichier '. $filesName[$i] . ' est trop volumineux !</p> 
                      </div>';
            }else {
                $uploadFileName = 'upload/'. $uploadController->uniqueFileName();
                move_uploaded_file($filesTmp[$i],$uploadFileName);
            }
        }
    }
}

?>
<!-- DirectoryIterator est le parent de FilesystemIterator-->
<?php $uploadedFiles = new DirectoryIterator('upload'); ?>
<div class="row mt-5 mb-5">
<?php foreach ($uploadedFiles as $uploadedFile) :?>
    <?php if(!$uploadedFile->isDot()) :?>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top img-fuid" src="upload/<?=$uploadedFile->getFilename()?>" alt="Card image cap">
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="<?=$uploadedFile->key()?>">
                    <input class="btn btn-danger" type="submit" value="delete">
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST[$uploadedFile->key()])) {
        if (file_exists('upload/'.$uploadedFile->getFilename())){
            unlink('upload/'.$uploadedFile->getFilename());
            header('location: index.php');
        }
    }
    ?>
    <?php endif;  ?>
<?php endforeach; ?>


</div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
