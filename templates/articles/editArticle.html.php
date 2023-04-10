<div class="container-fluid">
    <form action="" method="POST" enctype="multipart/form-data" class="register-form">
        <br>
        <br>
        <div class="row">
            <h2 style="color:coral;">Editer un article</h2>
            <div class="col-md-4 col-sm-4 col-lg-4">

                <label for="title">TITRE</label>
                <input name="title" class="form-control" type="text" value="<?= htmlspecialchars($article['title']) ?>">
            </div>

        </div>
        <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1 && isset($_GET['validate'])) { ?>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="sign_article">Signalements</label>
                    <input name="sign_article" class="form-control" type="text">
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="img_article">IMAGE</label>
                    <input name="img_article" class="form-control" type="file">
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <label for="content">CONTENU</label>
                <textarea name="content" class="form-control" rows="5" cols="50"><?= htmlspecialchars($article['content']) ?></textarea>
            </div>
        </div>
        <br>
        <?php if ($_SESSION['role'] >= 1) {
            if (isset($_GET['validate'])) { ?>
                <div class="row">
                    <img src="public/assets/img/articles/<?= htmlspecialchars($article['img_article']) ?>" alt="image de <?= htmlspecialchars($article['title']) ?>" style="width:100px">
                </div>
                <input type="hidden" name="img_article" value="<?= htmlspecialchars($article['img_article']) ?>">
            <?php } ?>
            <hr>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <a class="btn btn-danger" href="index.php?controller=article&task=delArticle&supprime_article=<?= htmlspecialchars($article['id_article']) ?>">
                        Supprimer</a>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <button class="btn btn-primary " type="submit" name="submit">Publier</button>
                </div>
                <?php if (isset($_GET['validate'])) { ?>
                    <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                        <button class="btn btn-secondary " type="submit" name="submit3">Renvoyer</button>
                    </div>
                <?php } ?>

            <?php } ?>
            <p style='color:white;'>
                <?= $message; ?>

            </p>
            </div>
    </form>
</div>