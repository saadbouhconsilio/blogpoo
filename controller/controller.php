<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $PostManager = new PostManager();

    $posts = $PostManager->getPosts();
    require('view/listPostView.php');
}

function post()
{
    $PostManager = new PostManager();
    $CommentManager = new CommentManager();

    $post = $PostManager->getPost($_GET['publication']);
    $comments = $CommentManager->getComments($_GET['publication']);
    require('view/postView.php');
}

function addComment($postId, $author, $comment)
{
    $CommentManager = new CommentManager();

    $affectedlines = $CommentManager->postComment($postId, $author, $comment);

    if ($affectedlines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

