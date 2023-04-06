<?php

require('libraries/utils.php');
require_once('libraries/models/Article.php');

session_start();

$articleModel = new Article();
$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

//recuperer l'article à éditer
$article = $articleModel->find($article_id);

//update l'article 
if (isset($_POST["title"]) && isset($_POST["img_article"]) && isset($_POST["content"])) {


    $title = htmlspecialchars($_POST["title"]);
    $img_article = htmlspecialchars($_POST["img_article"]);
    $content = htmlspecialchars($_POST["content"]);


    if (isset($_POST["submit"])) {
        $articleModel->update($title, $img_article, $content, $article_id);
        redirect("index.php");
    }
}

//renvoyer l'article 
if (isset($_POST["title"]) && isset($_POST["img_article"]) && isset($_POST["content"])) {


    $title = htmlspecialchars($_POST["title"]);
    $img_article = htmlspecialchars($_POST["img_article"]);
    $content = htmlspecialchars($_POST["content"]);
    $signal = htmlspecialchars($_POST["sign_article"]);


    if (isset($_POST["submit3"]) && $_SESSION['role'] > 1) {
        $articleModel->resend($title, $img_article, $content, $article_id, $signal);
        redirect("index.php");
    }


}


$pageTitle = "Publier un Article";
renderHTML('templates/articles/editArticle.html', compact('article', 'pageTitle'));



?>