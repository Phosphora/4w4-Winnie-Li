<?php 
/**
 * Template name: atelier
 */
?>

<?php get_header(); ?>
<main class="site__main">
<?php
if ( have_posts() ) : the_post(); ?>
<?php the_post_thumbnail(); ?>
<h1><?= get_the_title(); ?></h1>
<?php the_content();?>
<p>Date : <?php the_field('date'); ?></p>
<p>Heure : <?php the_field('heure'); ?></p>
<p>Durée : <?php the_field('duree'); ?></p>
<p>Local : <?php the_field('local'); ?></p>
<p>Formateur : <?php the_field('date_et_heure'); ?></p>
<?php endif;?>
</main><!-- #main -->
<?php
get_footer();