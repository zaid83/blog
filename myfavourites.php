<?php
session_start();



require('libraries/utils.php');
require_once('libraries/models/Favourite.php');

$favModel = new Favourite();

$sessionid = $_SESSION['id'];
$articles = $favModel->find($sessionid);


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