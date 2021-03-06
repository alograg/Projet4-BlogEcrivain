<?php

namespace Model;

require_once("Manager.php");

class CommentManager extends Manager {
// page post : récupère les commentaires sous un billet
    public function getComments($postId) {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

// fontion pour poster un commentaire
    public function postComment($postId, $author, $comment) {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    // supprimer un commentaire
    public function deleteComment($commentId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM reports WHERE comment_id = ?');
        $deletedComment = $req->execute(array($commentId));

        return $deletedComment;
    }
}