<?php
session_start();
require_once('libraries/autoload.php');

$controller = new \CONTROLLERS\Article;
$controller->likeArticle();