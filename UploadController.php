<?php
/**
 * Created by PhpStorm.
 * User: legolas
 * Date: 09/04/18
 * Time: 14:25
 */

class UploadController {
    private $extensionAllowed = [
        'jpg' => 'image/jpg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
    ];
    private $extension = [];
    //tailel du fichier en octet, 1 Mo = 1048576 octets
    private $sizeLimit = 5242880;


    public function checkSize($size)
    {
        if($size > $this->sizeLimit) {
            return false;
        }
    }

    public function uniqueFileName()
    {

        $uniqueFileName = 'image' . uniqid() . '.' . $this->extension;
        return $uniqueFileName;
    }

    private function getExtension(array $filesTmp)
    {
        foreach ($filesTmp as $fileTmp) {
            $this->extension = pathinfo($fileTmp, PATHINFO_EXTENSION);
        }
        return $this->extension;

    }

    public function checkExtension(array $fileType, array $fileTmp)
    {
        if (!in_array($fileType, $this->extensionAllowed) && array_key_exists($this->getExtension($fileTmp), $this->extensionAllowed)) {
            echo "Le fichier n'est pas une image";
        }

        return true;
    }

    //FunctionCustom.php
    static function dd($value){
        die( var_dump( $value ) );
    }
}