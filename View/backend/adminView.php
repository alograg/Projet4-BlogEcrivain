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
        <div class="col-md-offset-2 col-md-8 col-sm-12">
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

                    $countPost = 0;
                    foreach($posts as $post) {
                    ?>

                    <div class="block-main mb-30">
                        <div class="postTitle">
                                <h3 style="color:#000;"><?= $post['title']; ?></h3>
                        </div>
                            <div class="contentPost">
                                <p><?= nl2br(htmlspecialchars($post['extract'])) ?></p>
                                <button class="btn"><a class="Manager" href="index.php?action=displayUpdate&amp;id=<?= $post['id']; ?>">Modifier l'article</a></button>
                                    <button class="btn"><a class="Manager" href="index.php?action=removePost&amp;id=<?= $post['id']; ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');">Supprimer l'article</a></button>
                                <a href="index.php?action=updatePost&amp;id=<?= $post['id']; ?>"></a>
                                <em style="color:#000000;">le <?= $post['creation_date_fr'] ?></em>
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
                    if (isset($_GET['remove-comment']) &&  $_GET['remove-comment'] == 'success') {
                        echo '<p id="success">Le commentaire a bien été supprimé !</p>';
                    }

                    $countReport = 0;
                    while ($report = $reports->fetch()) {
                    ?>
                    <div class="block-main mb-30">
                        <a href="#"><?= $report['author']; ?></a>
                        <em style="color:#000000;"><?= $report['date_c']; ?></em>
                        <button class="btn"></button>
                            <div id="reportModal<?= $countReport ?>" class="modal">
                                <div class="modalContent">
                                    <p>Voulez-vous vraiment supprimer le commentaire de <em><?= $report['author']; ?></em> ?</p>
                                    <a href="index.php?action=deleteComment&amp;id=<?= $report['comment_id']; ?>">Oui</a>
                                    <span id="closeCommentModal<?= $countReport++ ?>">Non</span>
                                </div>
                            </div>
                        <p class="nbReports"><?= $report['nb_reports']; ?> signalements</p>
                        <p><?= $report['comment']; ?></p>	
                    </div>
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