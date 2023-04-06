<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();

//All articles
$listarticles = findAllArticles();

//Nb articles
$nbArticles = countAllArticles();

//All users
$listusers = findAllUsers();

//NB users
$nbUsers = countAllUsers();

//All comments
$listComs = findAllComments();

//Nb comments
$nbComs = countComments();


$pageTitle = "Administrateur";
$subheading = "Controle Admin";



if ($_SESSION['role'] == 3) {
    renderHTML(
        'templates/login/admin.html',
        compact('pageTitle', 'nbArticles', 'listarticles', 'listComs', 'listusers', 'nbUsers', 'nbComs', 'subheading')
    );
} else {
    redirect('logout.php');
}
?>