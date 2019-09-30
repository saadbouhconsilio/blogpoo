<?php $title = 'Commentaires' ?>
<?php ob_start(); ?>
        <div class="row">
        <div class="title"><h1>MY BLOG</h1></div>
        </div>
        <div class="row title">
        <a href="index.php">Retourner vers les publications</a> 
        </div>
        <div class="row">
        <div class="card esp">
                <div class="card-header taille">
                    <?=htmlspecialchars($post['titre']); ?>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p><?php echo  nl2br(htmlspecialchars($post['contenu'])); ?></p>
                    <footer class="blockquote-footer dur">Publiée le <cite title="Source Title"> <?php echo htmlspecialchars($post['date_creation_fr'])  ; ?> par <strong> <?php echo $post['auteur']; ?></strong></cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="row">
            <ins><div class="display-2"><strong><h5>Commentaires</h5></strong></div></ins>
        </div>
        <br>
        <?php
        while ($comment = $comments ->fetch())
        {
        ?>
        <div class="row">
            <p><strong> <?= htmlspecialchars($comment['auteur']); ?></strong>, <?= htmlspecialchars($comment['date_commentaire_fr']); ?> </p>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row"><?= htmlspecialchars($comment['commentaire']); ?></th>
                </tr>
            </tbody>
        </table>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-md-4">
            <form action="index.php?action=addComment&amp;publication=<?= $post['id']?>" method="POST">
                <div class="form-group">
                    <label for="auteur">Auteur</label> : <input class="form-control" type="text" required name="auteur" id="auteur">
                    <label for="commentaire">Commentaire</label> : <textarea class="form-control" required id="commentaire" name="commentaire" rows="2"></textarea>
                    <br>
                    <input type="hidden" name="" value="">
                    <input type="submit" value="commenter">
                </div>
            </div>
        </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>