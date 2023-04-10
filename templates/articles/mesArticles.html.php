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
        <?php foreach ($listarticles as $listarticle) : ?>
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
                <a href="article/editArticle/<?= htmlspecialchars($listarticle['id_article']) ?>" class="btn btn-primary">Editer</a>
              <?php } ?>
            </td>
            <td>
              <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1) { ?>
                <a href="article/delArticle/<?= htmlspecialchars($listarticle['id_article']) ?>" class="btn btn-danger">Supprimer</a>
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