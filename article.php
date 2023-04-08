<?php

session_start();

require_once('libraries/autoload.php');

$controller = new \CONTROLLERS\Article();
$controllerComment = new \CONTROLLERS\Comment();

$controllerComment->postComment();
$controller->showArticle();
$controllerComment->renderComment();


?>