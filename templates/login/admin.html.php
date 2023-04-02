<?php if (isset($_SESSION['id'])) { ?>
    <header class="masthead">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>
                            <?= $pageTitle ?>
                        </h1>
                        <span class="subheading">
                            <?= $subheading ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="tab-articles">
            <h2 align="center">
                Liste des articles(
                <?= $nbArticles; ?>)
            </h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Articles ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Signalements</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarticles as $listarticle): ?>
                        <tr>
                            <th scope="row">
                                <?= $listarticle['id_article'] ?>
                            </th>
                            <td>
                                <?= $listarticle['title'] ?>
                            </td>
                            <td>
                                <?= $listarticle['date_article'] ?>
                            </td>

                            <td>
                                <a href="editArticle.php?article_id=<?= $listarticle['id_article'] ?>"
                                    class="btn btn-primary">Editer</a>
                            </td>
                            <td>

                                <a href="delete.php?supprime_article=<?= $listarticle['id_article'] ?>"
                                    class="btn btn-danger">Supprimer</a>

                            </td>
                            <td>
                                <?= $listarticle['etat'] ?>
                            </td>
                            <td>
                                <?= $listarticle['Signalements'] ?>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

        <section class="tab-users">
            <h2 align="center">
                Liste des utilisateurs (
                <?= $nbUsers; ?>)
            </h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Users ID</th>
                        <th scope="col">Pseudos</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Rôles</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listusers as $listuser): ?>
                        <tr>
                            <th scope="row">
                                <?= $listuser['id'] ?>
                            </th>
                            <td>
                                <?= $listuser['pseudo'] ?>
                            </td>
                            <td>
                                <?= $listuser['email'] ?>
                            </td>

                            <td>
                                <a href="profil.php?id=<?= $listuser['id'] ?>" class="btn btn-primary">Editer</a>
                            </td>
                            <td>

                                <a href="delete.php?supprime_user=<?= $listuser['id'] ?>" class="btn btn-danger">Supprimer</a>

                            </td>
                            <td>
                                <?= $listuser['nom_role'] ?>
                            </td>


                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>

        <section class="tab-users">
            <h2 align="center">
                Liste des commentaires(
                <?= $nbComs; ?>)
            </h2>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre article</th>
                        <th scope="col">Pseudos</th>
                        <th scope="col">Commentaires</th>
                        <th scope="col">Date</th>
                        <th scope="col">Supprimer</th>



                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listComs as $listCom): ?>
                        <tr>
                            <th scope="row">
                                <?= $listCom['title'] ?>
                            </th>
                            <td>
                                <?= $listCom['pseudo'] ?>
                            </td>
                            <td>
                                <?= $listCom['comments'] ?>
                            </td>

                            <td>
                                <?= $listCom['date_comment'] ?>
                            </td>

                            <td>

                                <a href="delete.php?supprime_coms=<?= $listCom['id_comment'] ?>"
                                    class="btn btn-danger">Supprimer</a>

                            </td>



                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    </main>

<?php }
?>