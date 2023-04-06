<?php

require('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
require_once('libraries/models/User.php');

session_start();

$articleModel = new Article();
$commentModel = new Comment();
$userModel = new User();

//All articles
$listarticles = $articleModel->findAll();

//Nb articles
$nbArticles = $articleModel->countAll();

//All users
$listusers = $userModel->findAll();

//NB users
$nbUsers = $userModel->countAll();

//All comments
$listComs = $commentModel->findAll();

//Nb comments
$nbComs = $commentModel->countAll();


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