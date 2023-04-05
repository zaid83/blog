<?php
session_start();


require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
$sessionid = $_SESSION['id'];
$articles = findFavourites($sessionid);


if ($articles) {
    $pageTitle = "Mes favoris";
    $subheading = "Liste de mes favoris";
    $pageTitle2 = "Liste de mes favoris";
    $pageFav = true;



    renderHTML(
        'templates/articles/myfavourites.html',
        compact('pageTitle', 'subheading', 'pageTitle2', 'pageFav', 'articles')
    );

} else {
    $error = "Pas de favoris";
    renderHTML('noArticles', compact('error'));
}