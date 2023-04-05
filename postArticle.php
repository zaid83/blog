<?php
session_start();

if ($_SESSION['id']) {


    require('libraries/database.php');
    require('libraries/utils.php');

    $pdo = getPdo();
    $message = '';


    if (isset($_POST["title"]) && isset($_POST["img_article"]) && isset($_POST["content"])) {

        $author = $_SESSION['id'];
        $title = htmlspecialchars($_POST["title"]);
        $img_article = htmlspecialchars($_POST["img_article"]);
        $content = htmlspecialchars($_POST["content"]);

        if (isset($_POST["submit"])) {

            if (empty($title) || empty($img_article) || empty($content)) {
                $message = 'Un des champs est vide';

            } else if (strlen($title) >= 80) {
                $message = "Le titre fait plus de 80 caractères";
            } else if (strlen($content) <= 200) {
                $message = "L'article fait moins de 200 caractères";

            } else {
                addArticle($title, $img_article, $content, $author);
                redirect("index.php");
            }
        }
    }
}



$pageTitle = "Poster un article";

renderHTML("templates/articles/postArticle.html", compact('pageTitle', 'message'));





?>