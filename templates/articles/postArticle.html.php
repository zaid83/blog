<div class="container-fluid">
    <form action="postArticle.php" method="POST" enctype="multipart/form-data" class="register-form">
        <div class="row">
            <h2 style="color:coral;">Poster un article</h2>
            <div class="col-md-4 col-sm-4 col-lg-4">

                <label for="title">TITRE</label>
                <input name="title" class="form-control" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="img_article">IMAGE</label>
                <input name="img_article" class="form-control" type="file">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8 col-lg-8">
                <label for="content">CONTENU</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
        </div>
        <hr>
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
            <button class="btn btn-default logbutton" type="submit" name="submit">Nouvelle article</button>
        </div>
        <p style="color:white;">
            <?= $message ?>
        </p>

    </form>

</div>