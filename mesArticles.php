<?php
session_start();

require('libraries/utils.php');
require_once('libraries/models/Article.php');

$articleModel = new Article();
$sessionid = $_SESSION['id'];


// FIND ALL ARTICLES BY USER
$listarticles = $articleModel->findAllByUser($sessionid);


if ($listarticles) {
    $pageTitle = "Mes Articles";
    $subheading = "liste de mes articles";
    $pageTitle2 = "Liste de mes articles";


    renderHTML(
        'templates/articles/mesArticles.html',
        compact('pageTitle', 'subheading', 'pageTitle2', 'listarticles')
    );

} else {
    $error = "Pas d'articles";
    renderHTML('noArticles', compact('error'));
}