<div class="container-fluid">
    <form action="" method="POST" class="register-form">
        <h2 style="color:coral; text-align:center;">
            <?= $pageTitle ?>
        </h2>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="email">EMAIL</label>
                <input name="email" class="form-control" type="email">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default regbutton" type="submit" name="submitPass">Envoyé le lien</button>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default logbutton"> <a
                        href="index.php?controller=user&task=login">Connexion</a></button>
            </div>
        </div>
        <p style='color:white;'>
            <?= $message ?>
        </p>
</div>

</form>
</div>