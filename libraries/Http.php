<?php
class Http
{

    public static function redirect(string $path)
    {
        header("Location:" . $path . "");
    }
}