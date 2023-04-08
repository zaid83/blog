<header class="masthead">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>MANGAZ</h1>
                    <span class="subheading">Un blog sur les mangas</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 ">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <?php foreach ($articles as $article): ?>
                <div class="post-preview">
                    <img src="public/assets/img/articles/<?= $article['img_article'] ?>"
                        alt="img de <?= $article['title'] ?> ">
                    <div class="post-content">
                        <a href="index.php?controller=article&task=showArticle&article_id=<?= $article['id_article'] ?>">
                            <h2 class="post-title">
                                <?= $article['title'] ?>
                            </h2>
                        </a>
                        <p class="post-meta">
                            Posté par
                            <a href="#!">
                                <?= $article['pseudo'] ?>
                            </a>
                            le
                            <?= $article['date_article'] ?>
                        </p>
                    </div>
                </div>
                <br>
            <?php endforeach ?>

            <hr class="my-4" />
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Anciens
                    articles →</a></div>
        </div>
    </div>
</div>