<div class="container-fluid">
    <form action="login.php" method="POST" class="register-form">
        <h2 style="color:coral; text-align:center;">Connexion</h2>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="email">EMAIL</label>
                <input name="email" class="form-control" type="email">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">PASSWORD</label>
                <input name="password" class="form-control" type="password">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default regbutton" type="submit"><a href="register.php">Inscription</a></button>

            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default logbutton" type="submit">Se connecter</button>
            </div>
        </div>
        <p style='color:white;'>
            <?= $message ?>
        </p>
</div>

</form>
</div>