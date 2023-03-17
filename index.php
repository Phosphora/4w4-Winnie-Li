<?php
/**
 * index.php est le modèle par défaut du thème 4W4.
 */
?>

<?php get_header(); ?>
    <main>
        <pre>index.php</pre>
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post(); // Extrait un objet «post» ?>
                <article>
                    <h3> <?php the_title(); // Affiche le titre du post ?> </h3>
                    <h6> Extrait; </h6> <?php the_excerpt(); ?>
                    <h6> Le contenu; </h6> <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

    <?php get_footer(); ?>
</body>
</html>