<?php

require('libraries/utils.php');
require_once('libraries/autoload.php');

session_start();

$articleModel = new \MODELS\Article();
$commentModel = new \MODELS\Comment();
$userModel = new \MODELS\User();

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