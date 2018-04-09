<?php
/**
 * Created by PhpStorm.
 * User: legolas
 * Date: 09/04/18
 * Time: 14:25
 */

class UploadController {
    private $extensionAllowed = ['jpg', 'jpeg', 'png', 'gif'];
    public $extension;
    private $file;



    public function __construct($file)
    {
        $this->file = $file;
        $this->extension = $this->setExtension($file);

    }

    public function uniqueFileName()
    {
        $uniqueFileName = 'image' . uniqid() . '.' . self::getExtension();
        return $uniqueFileName;
    }
    public function setExtension($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
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
        if (!in_array($this->getExtension(), $this->extensionAllowed )) {
            echo "Le fichier n'est pas une image";
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */




}