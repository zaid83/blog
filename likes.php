<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();
if (isset($_GET['type'], $_GET['id']) and !empty($_GET['type']) and !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['type'];
    $sessionid = $_SESSION['id'];

    //find an article
    $check = selectArticle($getid);

    // if exist
    if ($check->rowCount() == 1) {

        // if click on likes
        if ($gett == 1) {
            $check_like = checkLike($getid, $sessionid);
            delDislike($getid, $sessionid);

            //if like exist
            if ($check_like->rowCount() == 1) {
                delLikes($getid, $sessionid);
            } else {
                insertLikes($getid, $sessionid);
            }

            // if click on dislikes
        } elseif ($gett == 2) {
            $check_dislike = checkDislike($getid, $sessionid);
            delLikes($getid, $sessionid);
            if ($check_dislike->rowCount() == 1) {
                delDislike($getid, $sessionid);
            } else {
                insertDislikes($getid, $sessionid);
            }
        }
        redirect('article.php?article_id=' . $getid);
    } else {
        exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
    }
} else {
    exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
}