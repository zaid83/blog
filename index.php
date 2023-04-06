<?php
session_start();

require_once('libraries/utils.php');
require_once('libraries/models/Article.php');

$Article = new Article();
//SELECT ALL VALID ARTICLES
$articles = $Article->findAllValid();


// RENDER PAGE
if ($articles) {
    $pageTitle = "Accueil";
    renderHTML(
        'templates/index.html',
        compact('articles', 'pageTitle')
    );

} else {
    $error = "Pas d'articles";
    renderHTML('noArticles');
}


?>