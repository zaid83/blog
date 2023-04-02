<?php
session_start();

require('models/database.php');
$sessionid = $_SESSION['id'];
$resultats = $pdo->prepare("SELECT * from articles INNER JOIN states s ON s.id_valid = articles.valid  WHERE author = ? ORDER BY date_article DESC");
$resultats->execute([$sessionid]);
$listarticles = $resultats->fetchAll();
$pageTitle = "Mes Articles";
$subheading = "liste de mes articles";
$pageTitle2 = "Liste de mes articles";


ob_start();
require('templates/articles/mesArticles.html.php');
$pageContent = ob_get_clean();

require('templates/layout.html.php');

?>