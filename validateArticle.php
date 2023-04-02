<?php
session_start();

require('models/database.php');

$resultats = $pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 3");

$articles = $resultats->fetchAll();

if (($articles)) {

    ob_start();
    require('templates/articles/validateArticle.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');

} else {
    $error = "Pas d'articles à valider";
    ob_start();
    require('noArticles.php');

    $pageContent = ob_get_clean();
    require('templates/layout.html.php');
}

?>