<?php
session_start();


require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();

$resultats = $pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 3");

$articles = $resultats->fetchAll();

if (($articles)) {

    renderHTML('templates/articles/validateArticle.html', compact('articles'));

} else {
    $error = "Pas d'articles à valider";

    renderHTML('noArticles');

}

?>