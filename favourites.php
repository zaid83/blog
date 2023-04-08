<?php

require('libraries/utils.php');
require_once('libraries/models/Favourite.php');
$favArticle = new \MODELS\Favourite();
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $sessionid = $_SESSION['id'];
    $checkfav = $favArticle->check($getid, $sessionid);

    if ($checkfav->rowCount() == 1) {
        $favArticle->delFav($sessionid, $getid);
        redirect('article.php?article_id=' . $getid);
    } else {

        $favArticle->add($sessionid, $getid);
        redirect('article.php?article_id=' . $getid);

    }
}