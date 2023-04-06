<?php


require('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
require_once('libraries/models/User.php');

$articleModel = new Article();
$commentModel = new Comment();
$userModel = new User();


if (isset($_GET['supprime_article'])) {
    $articleModel->del($_GET['supprime_article']);
    redirect('index.php');
}

if (isset($_GET['supprime_coms'])) {
    $commentModel->del($_GET['supprime_coms']);
    redirect('index.php');
}

if (isset($_GET['supprime_user'])) {
    $userModel->del($_GET['supprime_user']);
    redirect('index.php');
}
?>