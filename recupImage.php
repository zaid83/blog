<?php
$filename = $_FILES[$name_image]['name'];
$tmp_name = $_FILES[$name_image]['tmp_name'];
$size = $_FILES[$name_image]['size'];
$error = $_FILES[$name_image]['error'];
$tabExtension = explode('.', $filename);
$extension = strtolower(end($tabExtension));
$extensionValid = ['jpg', 'png', 'gif', 'jpeg', 'webp'];
$tailleMax = 4000000;

?>