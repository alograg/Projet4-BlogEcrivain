<!-- start section navbar -->
<nav id="main-nav">
    <div class="row">
      <div class="container">

        <div class="logo">
            <a href="index.php?action=listPosts">Billet simple pour l'alaska</a>
        </div>

        <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>

        <ul class="nav-menu list-unstyled">
            <li><a href="index.php?action=listPosts" class="smoothScroll">Accueil</a></li>
            <li><a href="index.php?action=displayLoginAdmin" class="smoothScroll">Administration</a></li>
        </ul>

      </div>
    </div>
</nav>
<!-- End section navbar -->

<?php 

$title = "Panneau d'administration"; ?>

<?php ob_start(); ?>

<section id="paddsection">
    <div class="container">
        <div class="section-title text-center">
            <h1>Panneau d'administration</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-offset-1 col-md-9 col-sm-12">
            <div id=adminFrame>

                <!-- bouton pour ajouter un billet -->
                <div class="createPost">
                    <h2>Ajouter un article</h2>
                    <button class="btn"><a class="Manager" href="index.php?action=create">Ecrire un article</a></button>
                </div>

                <!-- gestion des billets -->
                <div id="postManage">
                    <h2>Gestion des Articles</h2></br>

                    <?php
                    if (isset($_GET['update-status']) &&  $_GET['update-status'] == 'success') {
                        echo '<p id="success">L\'article a bient été modifié !<p>';
                    }
                    elseif (isset($_GET['new-post']) &&  $_GET['new-post'] == 'success') {
                        echo '<p id="success">L\'article a bient été posté !<p>';
                    }
                    elseif (isset($_GET['remove-post']) &&  $_GET['remove-post'] == 'success') {
                        echo '<p id="success">L\'article a bien été supprimé !</p>';
                    }

                    foreach($posts as $post) {
                    ?>

                    <div class="block-main mb-30">
                        <div class="postTitle">
                                <h3 style="color:#000;"><?= $post['title']; ?></h3>
                        </div>
                        <div class="contentPost">
                            <p><?= nl2br(htmlspecialchars($post['extract'])) ?></p>
                            <button class="btn"><a class="Manager" href="index.php?action=displayUpdate&amp;id=<?= $post['id']; ?>">Modifier l'article</a></button>
                            <button class="btn"><a class="Manager" href="index.php?action=removePost&amp;id=<?= $post['id']; ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer cet article ?');">Supprimer l'article</a></button>
                            <a href="index.php?action=updatePost&amp;id=<?= $post['id']; ?>"></a>
                            <em style="color:#000000;">le <?= $post['creation_date_fr'] ?></em><br /><br />
                            <button class="btn"><a class="Manager" href="index.php?action=dispayRemoveComment&amp;id=<?= $post['id']; ?>">Modération des commentaires</a></button>
                        </div>
                    </div>

                    <?php
                    }

                    if ($nbPage >= 2) {
                    ?>

                    <div class="dialing">
                    <?php
                        for ($i = 1; $i <= $nbPage; $i++) {
                            if ((!isset($_GET['page']) && $i == 1) || (isset($_GET['page']) && $_GET['page'] == $i)) {
                                echo "<a class='cPage'>$i</a>";
                            } else {
                                echo "<a href=\"index.php?action=displayAdmin&amp;page=$i\">$i</a>";
                            }
                        }
                    ?>
                    </div>

                    <?php
                    }
                    ?>
                </div>

                <!-- gestion des commentaires -->
                <div id="commentManage">
                    <h3>Gestion des commentaires signalés</h3></br>
                    <?php
                    while ($report = $reports->fetch()) {
                    ?>
                    <p style="color: #000; font-weight: 600;">Auteur du commentaire Sous le billet</p>
                    <p style="color: #b8a07c;"><?= $report['author']; ?> <a href="index.php?action=post&amp;id=<?= $post['id'] ?>"><?= $post['title']; ?></a>
                    <div class="contentPost">
                        <p style="color: #000;"><?= $report['comment']; ?></p>
                    </div>
                    <button class="btn"><a class="Manager" href="index.php?action=removeComment&amp;comment_id=<?= $report['comment_id']; ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ce commentaire ?');">Supprimer le commentaire ?</a></button>
                    <?php
                    }
                    $reports->closeCursor();
                    ?>
                </div>


            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../frontend/template.php'); ?>