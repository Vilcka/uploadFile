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


    public function uniqueFileName()
    {
        $uniqueFileName = 'image' . uniqid() . '.' . self::getExtension();
        return $uniqueFileName;
    }

    public function setExtension($fileName)
    {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        return $extension;

    }

    public function checkExtension($fileName)
    {

        self::dd(in_array($mimeType, $this->extensionAllowed));

        if (!in_array($mimeType, $this->extensionAllowed) && array_key_exists($this->getExtension(), $this->extensionAllowed)) {
            echo "Le fichier n'est pas une image";
        }

        return true;
    }

    //FunctionCustom.php
    static function dd($value){
        die( var_dump( $value ) );
    }
}