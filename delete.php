<?php

require('libraries/database.php');
require('libraries/utils.php');
$pdo = getPdo();

if (isset($_GET['supprime_article'])) {
    deleteElement($_GET['supprime_article'], 'articles', 'id_article');
    redirect('index.php'); 
}

if (isset($_GET['supprime_coms'])) {
    deleteElement($_GET['supprime_coms'], 'comments', 'id_comment');
    redirect('index.php');
}
if (isset($_GET['supprime_user'])) {
    deleteElement($_GET['supprime_user'], 'users', 'id');
    redirect('index.php');
}
?>