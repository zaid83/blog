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
                                <?= htmlspecialchars($listarticle['id_article']) ?>
                            </th>
                            <td>
                                <?= htmlspecialchars($listarticle['title']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($listarticle['date_article']) ?>
                            </td>

                            <td>
                                <a href="index.php?controller=article&task=editArticle&article_id=<?= htmlspecialchars($listarticle['id_article']) ?>"
                                    class="btn btn-primary">Editer</a>
                            </td>
                            <td>

                                <a href="index.php?controller=article&task=delArticle&supprime_article=<?= htmlspecialchars($listarticle['id_article']) ?>"
                                    class="btn btn-danger">Supprimer</a>

                            </td>
                            <td>
                                <?= htmlspecialchars($listarticle['etat']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($listarticle['Signalements']) ?>
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
                                <?= htmlspecialchars($listuser['id']) ?>
                            </th>
                            <td>
                                <?= htmlspecialchars($listuser['pseudo']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($listuser['email']) ?>
                            </td>

                            <td>
                                <a href="index.php?controller=user&task=editProfil&id=<?= htmlspecialchars($listuser['id']) ?>"
                                    class="btn btn-primary">Editer</a>
                            </td>
                            <td>

                                <a href="index.php?controller=user&task=delUser&supprime_user=<?= htmlspecialchars($listuser['id']) ?>"
                                    class="btn btn-danger">Supprimer</a>

                            </td>
                            <td>
                                <?= htmlspecialchars($listuser['nom_role']) ?>
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
                                <?= htmlspecialchars($listCom['title']) ?>
                            </th>
                            <td>
                                <?= htmlspecialchars($listCom['pseudo']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($listCom['comments']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($listCom['date_comment']) ?>
                            </td>

                            <td>

                                <a href="index.php?controller=comment&task=delComment&supprime_coms=<?= htmlspecialchars($listCom['id_comment']) ?>"
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