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
                    <img src="/blog/public/assets/img/articles/<?= htmlspecialchars($article['img_article']) ?>"
                        alt="img de <?= htmlspecialchars($article['title']) ?> ">
                    <div class="post-content">
                        <a href="article/showArticle/<?= htmlspecialchars($article['id_article']) ?>">
                            <h2 class="post-title">
                                <?= htmlspecialchars($article['title']) ?>
                            </h2>
                        </a>
                        <p class="post-meta">
                            Posté par
                            <span class="post-user">
                                <?= htmlspecialchars($article['pseudo']) ?>
                            </span>
                            le
                            <?= htmlspecialchars($article['date_article']) ?>
                        </p>
                    </div>
                </div>
                <br>
            <?php endforeach ?>

            <hr class="my-4" />

        </div>
    </div>
</div>