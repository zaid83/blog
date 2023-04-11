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

  <h2 align="center">
    <?= $pageTitle2 ?>
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
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Voulez-vous vraiment supprimer ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
              <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1 || $listarticle['valid'] == 2) { ?>
                <a href="article/editArticle/<?= htmlspecialchars($listarticle['id_article']) ?>"
                  class="btn btn-primary">Editer</a>
              <?php } ?>
            </td>
            <td>
              <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1) { ?>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#articleModal<?= $listarticle['id_article'] ?>">
                  Supprimer
                </button>
              <?php } ?>
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

<?php }
?>