<div class="container-fluid">
    <form action="" method="POST" class="register-form">
        <div class="row">
            <h2 style="color:coral;">Editer un article</h2>
            <div class="col-md-4 col-sm-4 col-lg-4">

                <label for="title">TITRE</label>
                <input name="title" class="form-control" type="text" value="<?= $article['title'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="img_article">IMAGE</label>
                <input name="img_article" class="form-control" type="text" value="<?= $article['img_article'] ?>">
            </div>
        </div>
        <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1) { ?>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="sign_article">Signalements</label>
                    <input name="sign_article" class="form-control" type="text">
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <label for="content">CONTENU</label>
                <textarea name="content" class="form-control" rows="5" cols="50"><?= $article['content'] ?></textarea>
            </div>
        </div>
        <hr>
        <div class="row">

            <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1) { ?>

                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <button class="btn btn-danger " type="submit" name="submit2"><a
                            href="editArticle.php?supprime=<?= $article['id_article'] ?>"></a> Supprimer</button>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <button class="btn btn-primary " type="submit" name="submit">Publier</button>
                </div>
            <?php } ?>
            <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                <button class="btn btn-secondary " type="submit" name="submit3">Renvoyer</button>
            </div>
        </div>
    </form>
</div>