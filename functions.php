<?php
/**
* L'ensemble des fonctions du thème
*/

function enfiler_css() {
wp_enqueue_style('4w4-principal', // Identificateur
        get_template_directory_uri() . '/style.css', // L'adresse url de style.css
        array(), // Définir les dépendances
        filemtime(get_template_directory() . '/style.css'), // Le calcul de la version du fichier css
        'all'); // Media
}

add_action( 'wp_enqueue_scripts', 'enfiler_css' );

/* Enregistrement des menus */
function enregistre_menus() {
	register_nav_menus( array(
	'menu_entete' => 'Menu entete',
	'menu_sidebar'  => 'Menu sidebar',
	) );
}
add_action( 'after_setup_theme', 'enregistre_menus', 0 );

/* add_theme_support */
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
    'height' => 150,
    'width'  => 150,
) );

/**
 * Modifie la requete principale de Wordpress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas çi nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */
function cidweb_modifie_requete_principal( $query ) {
    if (    $query->is_home() // Si page d'accueil
            && $query->is_main_query() // Si requête principale
            && ! is_admin() ) { // Si pas dans le tableau de bord
      // $query->set permet de modifier la requête principale.
      $query->set( 'category_name', 'note-de-cours-4w4' ); // Filtre les articles de categorie «note-de-cours4w4» slug
      $query->set( 'orderby', 'title' ); // Trier selon le champ title
      $query->set( 'order', 'ASC' ); // Trier en ordre ascendant
    }
}

add_action( 'pre_get_posts', 'cidweb_modifie_requete_principal' );