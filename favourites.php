<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $sessionid = $_SESSION['id'];
    $checkfav = checkFav($getid, $sessionid);

    if ($checkfav->rowCount() == 1) {
        delFavourites($sessionid, $getid);
        redirect('article.php?article_id=' . $getid);
    } else {

        addFavourites($sessionid, $getid);
        redirect('article.php?article_id=' . $getid);

    }
}