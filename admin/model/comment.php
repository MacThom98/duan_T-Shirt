<?php

require_once 'pdo.php';

class Comment {
    public function getAllComments() {
        $sql = "SELECT * FROM comment";
        $comments = pdo_query($sql);
        return $comments;
    }

    public function getCommentById($commentId) {
        $sql = "SELECT * FROM comment WHERE id = ?";
        $comment = pdo_query_one($sql, $commentId);
        return $comment;
    }

    public function addComment($userId, $productId, $content) {
        $sql = "INSERT INTO comment (user_id, product_id, content) VALUES (?, ?, ?)";
        pdo_execute($sql, $userId, $productId, $content);
    }

    public function updateComment($commentId, $content) {
        $sql = "UPDATE comment SET content = ? WHERE id = ?";
        pdo_execute($sql, $content, $commentId);
    }

    public function deleteComment($commentId) {
        $sql = "DELETE FROM comment WHERE id = ?";
        pdo_execute($sql, $commentId);
    }
}
