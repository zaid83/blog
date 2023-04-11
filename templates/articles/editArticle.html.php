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
                <textarea name="content" class="form-control" rows="5"
                    cols="50"><?= htmlspecialchars($article['content']) ?></textarea>
            </div>
        </div>
        <br>
        <?php if ($_SESSION['role'] >= 1) {



            if (isset($_GET['validate'])) { ?>
                <div class="row">
                    <img src="public/assets/img/articles/<?= htmlspecialchars($article['img_article']) ?>"
                        alt="image de <?= htmlspecialchars($article['title']) ?>" style="width:100px">
                </div>
                <input type="hidden" name="img_article" value="<?= htmlspecialchars($article['img_article']) ?>">
            <?php } ?>
            <hr>
            <div class="row">


                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#articleModal<?= $article['id_article'] ?>">
                        Supprimer
                    </button>
                </div>



                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                    <button class="btn btn-primary " type="submit" name="submit">Publier</button>
                </div>


                <?php if (isset($_GET['validate'])) { ?>
                    <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                        <button class="btn btn-secondary " type="submit" name="submit3">Renvoyer</button>
                    </div>


                <?php }
        } ?>


            <p style='color:white;'>
                <?= $message; ?>

            </p>
        </div>
    </form>
</div>


<div class="modal" id="articleModal<?= $article['id_article'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppresion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger"> <a
                        href="article/delArticle/<?= $listarticle['id_article'] ?>">Supprimer</a></button>
            </div>
        </div>
    </div>
</div>