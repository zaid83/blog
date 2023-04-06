<?php


require('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
require_once('libraries/models/User.php');

$articleModel = new Article();
$commentModel = new Comment();


if (isset($_GET['supprime_article'])) {
    $articleModel->del($_GET['supprime_article'], "id_article");
    redirect('index.php');
}

if (isset($_GET['supprime_coms'])) {
    $commentModel->del($_GET['supprime_coms'], "id_comment");
    redirect('index.php');
}

if (isset($_GET['supprime_user'])) {
    $userModel->del($_GET['supprime_user'], 'users', 'id');
    redirect('index.php');
}
?>