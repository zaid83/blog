<section class="content-item" id="comments">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-sm-8">
                <?php if (isset($_SESSION['id'])) { ?>
                    <form method="POST" action="">
                        <h3 class="pull-left">Poster un commentaire</h3>

                        <fieldset>
                            <div class="row">
                                <div class="col-sm-3 col-lg-2 hidden-xs">
                                    <img class="img-responsive" src="public/assets/img/users/<?= $_SESSION['avatar'] ?>" alt="img de <?= $_SESSION['pseudo'] ?> ">
                                </div>
                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                    <textarea class="form-control" id="message" placeholder="Votre message" required="" name="commentaire"></textarea>
                                </div>
                                <button type="submit" name="submit_commentaire" class="btn btn-sm btn-primary pull-right">Envoyer</button>
                            </div>
                        </fieldset>

                    </form>
                <?php } ?>

                <?php if (isset($msg)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php } ?>
                <h3>
                    <?= $nbcomments['nbComments'] ?> Commentaires
                </h3>



                <?php foreach ($comments as $comment) : ?>
                    <div class="media">
                        <a class="pull-left" href="#"><img class="media-object" src="public/assets/img/users/<?= $comment['avatar']; ?>" alt=""></a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <?= $comment['pseudo']; ?>
                            </h4>
                            <p>
                                <?= $comment['comments']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="media-footer">
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>
                                <?= $comment['date_comment']; ?>
                            </li>
                        </ul>
                        <?php if($_SESSION['id'] == $comment['id_user']) { ?>
                        <button class="btn btn-danger"><a href="index.php?controller=comment&task=delCommentById&supprime_coms=<?= $comment['id_comment'] ?>">Supprimer </a></button>
                        <?php } ?>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</section>