<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?= $pageTitle ?>
    </title>
    <link rel="icon" type="image/x-icon" href="/blog/public/assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Core theme CSS (includes Bootstrap)-->
    <base href="/blog/">
    <link href="public/css/styles.css" rel="stylesheet" />
    <link href="public/css/register.css" rel="stylesheet" />
    <link href="public/css//blog.css" rel="stylesheet" />
    <link href="public/css/comments.css" rel="stylesheet">


</head>

<body>

    <?php

    require('templates/nav.html.php');
    ?>

    <?= $pageContent ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/blog/public/js/scripts.js"></script>
    <script src="/blog/public/js/listAdmin.js"></script>
</body>