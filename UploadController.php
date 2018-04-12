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
    private $sizeLimit = 1048576;


    public function checkSize($size)
    {
        if($size > $this->sizeLimit) {
            return false;
        }
        return true;
    }

    public function uniqueFileName()
    {
        $uniqueFileName = 'image' . uniqid() . '.' . $this->extension;
        return $uniqueFileName;
    }

    public function getExtension(array $filesName)
    {
        foreach ($filesName as $fileName) {
            $this->extension = pathinfo($fileName, PATHINFO_EXTENSION);
        }
        return $this->extension;
    }

    public function checkExtension(string $fileType, array $fileName)
    {
        if (!array_key_exists($this->getExtension($fileName), $this->extensionAllowed) && !in_array($fileType, $this->extensionAllowed)) {
            return false;
        }
        return true;
    }
}