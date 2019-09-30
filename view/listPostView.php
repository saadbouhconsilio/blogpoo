<?php $title = 'Les publications' ?>
<?php ob_start(); ?>
    <div class="title"><h1>MY BLOG</h1></div>
    <h5>Mes dernières publications</h5>
    <br>
<?php
while ($data = $posts ->fetch())
{
    ?>
    <div class="card esp">
        <div class="card-header taille">
            <?= htmlspecialchars($data['titre']); ?>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?= nl2br(htmlspecialchars($data['contenu'])); ?></p>
                <footer class="blockquote-footer dur">Publiée le <cite title="Source Title"> <?= htmlspecialchars($data['date_creation_fr'])  ; ?> par <strong> <?= $data['auteur']; ?></strong></cite></footer>
                <div class="sep"><a class="btn btn-primary btn-sm" href="index.php?publication=<?=$data['id'];?>&&action=post" role="button">Les commentaires</a></div>
            </blockquote>

        </div>
    </div>
    <?php
};
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>