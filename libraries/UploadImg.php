<?php

class UploadImg
{
    public static function upload(string $name_image)
    {
        $filename = $_FILES[$name_image]['name'];
        $tmp_name = $_FILES[$name_image]['tmp_name'];
        $size = $_FILES[$name_image]['size'];
        $error = $_FILES[$name_image]['error'];
        $tabExtension = explode('.', $filename);
        $extension = strtolower(end($tabExtension));
        $extensionValid = ['jpg', 'png', 'gif', 'jpeg', 'webp'];
        $tailleMax = 4000000;
        $tab = compact('filename', 'extension', 'tabExtension', 'error', 'size', 'tmp_name', 'extensionValid', 'tailleMax');
        return $tab;
    }
}