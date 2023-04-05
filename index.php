<?php
session_start();

require_once('libraries/database.php');
require_once('libraries/utils.php');

$pdo = getPdo();

//SELECT ALL VALID ARTICLES
$articles = findAllArticlesValid();

// RENDER PAGE
if ($articles) {
    $pageTitle = "Accueil";
    renderHTML(
        'templates/index.html',
        compact('articles')
    );

} else {
    $error = "Pas d'articles";
    renderHTML('noArticles');
}


?>