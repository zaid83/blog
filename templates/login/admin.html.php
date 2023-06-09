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
        <h2 class="titleAdmin" align="center">
            Crud Administrateur
        </h2>
        <select class="form-select form-select-lg mb-3" id="selectList" aria-label=".form-select-sm example"
            onchange="selectOption()">
            <option selected>Selectionne ta liste</option>
            <option value="1">Articles</option>
            <option value="2">Utilisateurs</option>
            <option value="3">Commentaires</option>
        </select>
        <section id="tab-articles" class="section-list">
            <h2 align="center">
                Liste des articles(
                <?= $nbArticles; ?>)
            </h2>
            <br>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="thead-dark bg-primary">
                        <tr>
                            <th scope="col">Articles ID</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Date</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Etat</th>
                            <th scope="col">Signals</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listarticles as $listarticle): ?>
                            <!-- Modal -->
                            <div class="modal fade" id="articleModal<?= $listarticle['id_article'] ?>" tabindex="1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppresion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous vraiment supprimer ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="button" class="btn btn-danger"> <a
                                                    href="article/delArticle/<?= $listarticle['id_article'] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <a href="article/editArticle/<?= htmlspecialchars($listarticle['id_article']) ?>"
                                        class="btn btn-primary">Editer</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#articleModal<?= $listarticle['id_article'] ?>">
                                        Supprimer
                                    </button>


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
            </div>
        </section>

        <section id="tab-users" class="section-list">
            <h2 align=" center">
                Liste des utilisateurs (
                <?= $nbUsers; ?>)
            </h2>
            <br>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="thead-dark bg-primary">
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
                            <!-- Modal -->
                            <div class="modal fade" id="userModal<?= $listuser['id'] ?>" tabindex="1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppresion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous vraiment supprimer ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="button" class="btn btn-danger"> <a
                                                    href="user/delUser/<?= $listuser['id_article'] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <a href="user/editProfil/<?= htmlspecialchars($listuser['id']) ?>"
                                        class="btn btn-primary">Editer</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#userModal<?= $listuser['id'] ?>">
                                        Supprimer
                                    </button>

                                </td>
                                <td>
                                    <?= htmlspecialchars($listuser['nom_role']) ?>
                                </td>


                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="tab-coms" class="section-list">
            <h2 align=" center">
                Liste des commentaires(
                <?= $nbComs; ?>)
            </h2>
            <br>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="thead-dark bg-primary">
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
                            <!-- Modal -->
                            <div class="modal fade" id="commentModal<?= $listCom['id_comment'] ?>" tabindex="1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppresion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous vraiment supprimer ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="button" class="btn btn-danger"> <a
                                                    href="comment/delComment/<?= $listCom['id_comment'] ?>">Supprimer</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#commentModal<?= $listCom['id_comment'] ?>">
                                        Supprimer
                                    </button>

                                </td>
                            </tr>




                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </section>
    </main>



<?php }
?>