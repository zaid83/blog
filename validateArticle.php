<?php
session_start();

require('libraries/utils.php');
require_once('libraries/autoload.php');

$articleModel = new Article();
$articles = $articleModel->inValidation();

if ($_SESSION['role'] > 1) {
    if (($articles)) {
        $pageTitle = "Validation des articles";
        renderHTML('templates/articles/validateArticle.html', compact('articles', 'pageTitle'));

    } else {

        $error = "Pas d'articles à valider";
        renderHTML('noArticles', compact('error'));

    }
} else {

    redirect('logout.php');

}
?>