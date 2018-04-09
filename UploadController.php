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
    private $extension;
    private $fileName;
    private $tmpFilesPath;




    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->extension = $this->setExtension($fileName);

    }

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

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }



    public function checkExtension()
    {

        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mimeType = finfo_file($finfo, $this->fileName);

        self::dd(in_array($mimeType, $this->extensionAllowed));

        if (!in_array($mimeType, $this->extensionAllowed) && array_key_exists($this->getExtension(), $this->extensionAllowed)) {
            echo "Le fichier n'est pas une image";
        }
        finfo_close($finfo);
        return true;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    //FunctionCustom.php
    static function dd($value){
        die( var_dump( $value ) );
    }

}