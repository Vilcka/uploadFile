<?php
/**
 * Created by PhpStorm.
 * User: legolas
 * Date: 09/04/18
 * Time: 14:25
 */

class UploadController {
    /**
     * @var array
     */
    private $extensionAllowed = [
        'jpg' => 'image/jpg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
    ];

    /**
     * @var array
     */
    private $extension = [];

    //taille du fichier en octet, 1 Mo = 1048576 octets
    /**
     * @var int
     */
    private $sizeLimit = 1048576;


    /**
     * @param $size
     * @return bool
     */
    public function checkSize($size)
    {
        if($size > $this->sizeLimit) {
            return false;
        }
        return true;
    }

    /**
     * @return string
     */
    public function uniqueFileName()
    {
        $uniqueFileName = 'image' . uniqid() . '.' . $this->extension;
        return $uniqueFileName;
    }

    /**
     * @param string $fileName
     * @return array|mixed
     */
    public function getExtension(string $fileName)
    {

        $this->extension = pathinfo($fileName, PATHINFO_EXTENSION);

        return $this->extension;
    }

    /**
     * @param string $fileType
     * @param string $fileName
     * @return bool
     */
    public function checkExtension(string $fileType, string $fileName)
    {
        if (!array_key_exists($this->getExtension($fileName), $this->extensionAllowed) &&
            !in_array($fileType, $this->extensionAllowed)) {
            return false;
        }
        return true;
    }
}