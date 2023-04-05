<?php

if (isset($_SESSION['id']) && $_SESSION['role'] > 1) { ?>
    <header class="masthead">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>
                            <?php if (isset($pageTitle)) {
                                echo $pageTitle;
                            } else {
                                echo 'Modérateur';
                            } ?>
                        </h1>
                        <span class="subheading">
                            <?php if (isset($subheading)) {
                                echo $subheading;
                            } else {
                                echo 'Valider articles';
                            } ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 ">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach ($articles as $article): ?>
                    <div class="post-preview">
                        <img src="<?= $article['img_article'] ?>" alt="img article">
                        <div class="post-content">
                            <a href="editarticle.php?article_id=<?= $article['id_article'] ?>">
                                <h2 class="post-title">
                                    <?= $article['title'] ?>
                                </h2>
                            </a>
                            <p class="post-meta">
                                Posté par
                                <span href="#!">
                                    <?= $article['pseudo'] ?>
                                </span>
                                le
                                <?= $article['date_article'] ?>
                            </p>
                        </div>
                    </div>
                    <br>
                <?php endforeach ?>
            <?php } else {
    die("Vous n'avez pas les droits");
}
?>