<div class="container-fluid">
    <form action="" method="POST" class="register-form">
        <h2 style="color:coral; text-align:center;">
            <?= $pageTitle ?>
        </h2>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">NOUVEAU PASSWORD</label>
                <input name="password" class="form-control" type="password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password2">RETAPEZ LE PASSWORD</label>
                <input name="password2" class="form-control" type="password">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default logbutton" type="submit" name="submitPass">Changer mot de passe</button>
            </div>
        </div>
        <p style='color:white;'>
            <?= $message ?>
        </p>
</div>

</form>
</div>