<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php"> MANGAZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php if (session_id()) { ?>
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Accueil</a></li>
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="index.php?controller=user&task=login">Se connecter</a>
                        </li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="index.php?controller=user&task=register">S'inscrire</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class=" nav-item dropdown">
                            <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Articles
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?controller=article&task=postArticle">Nouvel
                                        Article</a>
                                </li>
                                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?controller=article&task=listUser">Mes
                                        Articles</a>
                                </li>
                                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                        href="index.php?controller=favourite&task=list">Mes
                                        Favoris</a>
                                </li>
                                <?php if (isset($_SESSION['id']) && $_SESSION['role'] > 1) { ?>
                                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                            href="index.php?controller=article&task=validateArticle">Valider
                                            Article</a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>


                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="index.php?controller=user&task=editProfil&id=<?= $_SESSION['id'] ?>">
                                <?php echo $_SESSION['pseudo']; ?>
                            </a></li>


                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="index.php?controller=user&task=logout">Se déconnecter</a>
                        </li>

                    <?php } ?>
                    <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 3) { ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="index.php?controller=user&task=allList">Admin</a></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>