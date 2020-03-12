<!-- start section navbar -->
<nav id="main-nav">
    <div class="row">
      <div class="container">

        <div class="logo">
            <a href="index.php">Billet simple pour l'alaska</a>
        </div>

        <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>

        <ul class="nav-menu list-unstyled">
            <li><a href="#header" class="smoothScroll">Accueil</a></li>
            <li><a href="#about" class="smoothScroll">A propos</a></li>
            <li><a href="#journal" class="smoothScroll">Journal</a></li>
            <li><a href="index.php?action=post" class="smoothScroll">Billets</a></li>
            <li><a href="#contact" class="smoothScroll">Contact</a></li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- End section navbar -->

<!-- start section header -->
<div id="header" class="home">

  <div class="container">
    <div class="header-content">
        <h1>Billet simple pour l'Alaska</h1>
        <h2 class="title">Je suis <span class="typed"></span></h2>
        <p>Acteur, Ecrivain</p>
    </div>
  </div>
</div>
<!-- End section header -->


<!-- start section about us -->
<div id="about" class="paddsection">
  <div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-4 ">
            <div class="div-img-bg">
                <div class="about-img">
                    <img src="public/images/me.jpg" class="img-responsive" alt="me">
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="about-descr">
                <p class="p-heading">Vivre et travailler en Alberta et en Colombie-Britannique pendant plus de deux décennies, avec les montagnes et la mer à proximité, m’a presqu’enlevé toute envie de faire une croisière en Alaska. Je ne pouvais juste pas imaginer que ce serait très différent de ce que je voyais tous les jours. </p>
                <p class="separator">Mais ma perspective a totalement changé lorsque j’ai dû aller en croisière en Alaska pour mon nouveau roman… J’étais complètement émerveillé par les voies navigables parfaites, l’abondante faune et les magnifiques teintes de bleu des géants glaciers. À date, l’Alaska reste l’une de mes destinations de croisière préférées.</p>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- end section about us -->

<!-- start section journal -->
<div id="journal" class="text-left paddsection">

  <div class="container">
    <div class="section-title text-center">
        <h2>journal</h2>
    </div>
    </div>
    <div class="container">
    <div class="journal-block">
        <div class="row">
            <!-- Images avant liste des derniers posts -->
            <div class="col-lg-4 col-md-6">
                <div class="journal-info">
                <a href="blog-single.html"><img src="public/images/blog-post-1.jpg" class="img-responsive" alt="img"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="journal-info">
                <a href="blog-single.html"><img src="public/images/blog-post-2.jpg" class="img-responsive" alt="img"></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="journal-info">
                <a href="blog-single.html"><img src="public/images/blog-post-3.jpg" class="img-responsive" alt="img"></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div id="posts">
  <div class="container">
    <!-- Liste des derniers posts -->
    <div class="col-12">
      <div class="journal-txt">
        <?php
        while ($data = $posts->fetch())
        {
        ?>
        <h4><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h4>
        <p class="contentPost">
            <em>le <?= $data['creation_date_fr'] ?></em><br>
            <?= nl2br(htmlspecialchars($data['content'])) ?><br />
        </p>
        <?php
        }
        $posts->closeCursor();
        ?>
      </div>
    </div>
  </div>
</div>
<!-- End section journal -->

<?php require_once('contact.php');?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>