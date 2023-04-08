<?php


require('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
require_once('libraries/models/User.php');

$articleModel = new Article();
$commentModel = new Comment();
$userModel = new User();


if (isset($_GET['supprime_article'])) {
    $articles = $articleModel->find($_GET['supprime_article']);
    unlink("public/assets/img/articles/" . $articles['img_article'] . "");
    $articleModel->del($_GET['supprime_article']);

    redirect('index.php');
}

if (isset($_GET['supprime_coms'])) {
    $commentModel->del($_GET['supprime_coms']);
    redirect('admin.php');
}

if (isset($_GET['supprime_user'])) {
    $user = $userModel->find($_GET['supprime_user']);
    unlink("public/assets/img/users/" . $user['avatar'] . "");
    $userModel->del($_GET['supprime_user']);
    redirect('admin.php');
}
?>