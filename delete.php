<?php


require('libraries/utils.php');
require_once('libraries/autoload.php');

$controllerA = new \CONTROLLERS\Article();
$controllerC = new \CONTROLLERS\Comment();

$userModel = new \MODELS\User();

$controllerA->delArticle();
$controllerC->delComment();



if (isset($_GET['supprime_user'])) {
    $user = $userModel->find($_GET['supprime_user']);
    unlink("public/assets/img/users/" . $user['avatar'] . "");
    $userModel->del($_GET['supprime_user']);
    redirect('admin.php');
}
?>