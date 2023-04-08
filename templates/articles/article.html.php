<header class="masthead" style="background-image: url('public/assets/img/articles/<?= $article['img_article'] ?>')">

</header>

<div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="post-heading">
                <h1>
                    <?= $article['title'] ?>
                </h1>
                <span class="meta2">
                    Posté par
                    <a href="#!" class="post-user">
                        <?= $article['pseudo'] ?>
                    </a>
                    le
                    <?= $article['date_article'] ?>
                </span><br>
                <span class="meta">
                    <?php
                    if (isset($_SESSION['id'])) {
                        if ($check_like->rowCount() == 1) { ?>
                            <a href="likes.php?type=1&id=<?= $article['id_article'] ?>"><i style="color:red" class="fa fa-heart"
                                    aria-hidden="true"></i>
                                J'aime </a>
                        <?php } else { ?>
                            <a href="likes.php?type=1&id=<?= $article['id_article'] ?>"><i class="fa fa-heart"
                                    aria-hidden="true"></i>
                                J'aime </a>
                        <?php } ?>
                        <?php if ($check_dislike->rowCount() == 1) { ?>
                            <a href="likes.php?type=2&id=<?= $article['id_article'] ?>"><i style="color:blue"
                                    class="fa fa-thumbs-down" aria-hidden="true"></i>
                                J'aime pas </a>
                        <?php } else { ?>
                            <a href="likes.php?type=2&id=<?= $article['id_article'] ?>"><i class="fa fa-thumbs-down"
                                    aria-hidden="true"></i>
                                J'aime pas </a>
                        <?php } ?>
                        <?php if ($checkfav->rowCount() == 1) { ?>
                            <a href="favourites.php?id=<?= $article['id_article'] ?>"><i style="color:red" class="fa fa-minus"
                                    aria-hidden="true"></i>
                                <span style="color:red">Retirer des favoris</span>
                            <?php } else { ?>
                                <a href="favourites.php?id=<?= $article['id_article'] ?>"><i style="color:green"
                                        class="fa fa-plus" aria-hidden="true"></i>
                                    <span style="color:green">Ajouter aux favoris</span>
                                <?php } ?>

                            </a>
                            <span><i class="fa fa-thumbs-up count"></i>
                                <?= $likes ?>
                            </span>
                            <span><i class="fa fa-thumbs-down count"></i>
                                <?= $dislikes ?>
                            </span>
                    </span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>
                    <?= $article['content'] ?>
                </p>
            </div>
        </div>
    </div>
</article>