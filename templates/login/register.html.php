<div class="container-fluid register login">
    <form action="" method="POST" class="register-form">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <h2 style="color:coral; text-align:center;">Inscription</h2>
                <label for="firstName">PSEUDO</label>
                <input name="pseudo" class="form-control" type="text" value=''>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="email">EMAIL</label>
                <input name="email" class="form-control" type="email" value=''>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">PASSWORD</label>
                <input name="password" class="form-control" type="password" value=''>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password2">RETAPER VOTRE PASSWORD</label>
                <input name="password2" class="form-control" type="password" value=''>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default regbutton" type="submit" name="submit">S'inscrire</button>

            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default logbutton"> <a href="user/login">Connexion</a></button>
            </div>

        </div>
        <a href="user/forgotP" style='color:white;'>Mot de passe oublié</a>
        <p style='color:white;'>
            <?= $message ?>
        </p>
    </form>
</div>