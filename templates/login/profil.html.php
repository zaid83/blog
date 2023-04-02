<div class="container-fluid">
    <form action="" method="POST" class="register-form">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <img class="media-object" src="<?= $user['avatar'] ?>" alt="profil" width="80px" height="100px">

            </div>
            <div class="col-8">
                <h2 style="color:coral;">Votre Profil</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">

                <label for="pseudo">PSEUDO</label>
                <input name="pseudo" class="form-control" type="text" value="<?= $user['pseudo'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="email">EMAIL</label>
                <input name="email" class="form-control" type="email" value="<?= $user['email'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">MOT DE PASSE</label>
                <input name="password" class="form-control" type="password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="avatar">AVATAR</label>
                <input name="avatar" class="form-control" type="text" value="<?= $user['avatar'] ?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default logbutton" type="submit" name="submit">Mettre à jour</button>
            </div>
            <p style='color:white;'>
                <?= $message; ?>

            </p>
        </div>
    </form>
</div>