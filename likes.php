<?php

require('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Like.php');
require_once('libraries/models/Dislike.php');

$articleModel = new Article();
$likeArticle = new Like();
$dislikeArticle = new Dislike();

session_start();
if (isset($_GET['type'], $_GET['id']) and !empty($_GET['type']) and !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['type'];
    $sessionid = $_SESSION['id'];

    //find an article
    $check = $articleModel->select($getid);

    // if exist
    if ($check->rowCount() == 1) {

        // if click on likes
        if ($gett == 1) {
            $check_like = $likeArticle->check($getid, $sessionid);
            $dislikeArticle->del($getid, $sessionid);

            //if like exist
            if ($check_like->rowCount() == 1) {
                $dislikeArticle->del($getid, $sessionid);
            } else {
                $likeArticle->insert($getid, $sessionid);
            }

            // if click on dislikes
        } elseif ($gett == 2) {
            $check_dislike = $dislikeArticle->check($getid, $sessionid);
            $likeArticle->del($getid, $sessionid);
            if ($check_dislike->rowCount() == 1) {
                $dislikeArticle->del($getid, $sessionid);
            } else {
                $dislikeArticle->insert($getid, $sessionid);
            }
        }
        redirect('article.php?article_id=' . $getid);
    } else {
        exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
    }
} else {
    exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
}