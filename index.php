<?php
session_start();

require_once('libraries/database.php');
require_once('libraries/utils.php');

$pdo = getPdo();

//SELECT ALL VALID ARTICLES
$resultats = $pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 1 ORDER BY date_article DESC");
$articles = $resultats->fetchAll();

// RENDER PAGE
if ($articles) {
    $pageTitle = "Accueil";
    renderHTML(
        'templates/index.html',
        compact('articles')
    );

} else {
    renderHTML('noArticles');
}


?>