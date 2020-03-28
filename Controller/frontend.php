<?php

namespace Controller;

require_once(__DIR__ . "/../Model/PostManager.php");
require_once(__DIR__ . "/../Model/CommentManager.php");
require_once(__DIR__ . "/../Model/Pagination.php");
require_once(__DIR__ . "/../Model/ReportManager.php");

// chargement des classes
use Model\PostManager;
use Model\CommentManager;
use Model\Pagination;
use Model\ReportManager;

class Frontend {
    // pour les derniers posts sur la page d'accueil
    function listPosts() {
        $pagination = new Pagination();
        $postManager = new PostManager();

        $postsPerPage = 3;

        $nbPosts = $pagination->getPostsPagination();
        $nbPage = $pagination->getPostsPages($nbPosts, $postsPerPage);

        if (!isset($_GET['page'])) {
            $cPage = 1;
        } else {
        if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPage) {
        $cPage = (intval($_GET['page']) - 1) * $postsPerPage;
            }
        }
        
        $posts = $postManager->getPosts($cPage, $postsPerPage);

        require(__DIR__ . '/../View/frontend/home.php');
    }

    // pour afficher un seul billet
    function post() {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require(__DIR__ . '/../View/frontend/postView.php');
    }

    // pour ajouter un commentaire
    function addComment($postId, $author, $comment) {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    // signaler un commentaire
    function postReport() {
        $reportManager = new ReportManager();

        $reported = $reportManager->postReports($_GET['comment_id']);

        if ($reported === false) {
            throw new Exception('impossible de signaler le commentaire !');
        } else {
            header('Location: index.php?action=displayAdmin');
        }
    }

    // envoie du formulaire de contact
    function sendContactForm() {
        ini_set("SMTP","smtp.gmail.com");
        ini_set("smpt_port", 587);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $message = addslashes($message);
        $message = str_replace("\'","'",$message);

        $to = "lili.utahime@gmail.com";
        $subject = "Formulaire de contact";
        $msg = "Vous avez un nouveau message\n
        Nom: $name\n
        Email: $email\n
        Message: $message";
        $head = "From: $name \n 
        Reply-To: $email";

        mail($to, $subject, $msg, $head);

        require(__DIR__ . '/../View/frontend/contact.php');
    }

    function mentionsLegales() {
        require(__DIR__ . '/../View/frontend/mentionslegales.php');
    }
}