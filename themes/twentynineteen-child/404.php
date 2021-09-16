<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

/** IMPORTANTNOTE:
 * puisque j'ai dupliqué and modifier le fichier de modèle (template file) header.php du thème parent à celui d'enfant,
 * le fichier que cette fonction va charger est celui du thème enfant et pas celui du thème parent
 */
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<!-- NOTE: ici j'ai tout simplement ajouter les titres avec des choses de marrant pour bien accompagner les images -->
					<h2 class="page-subtitle"><?php _e( "Is u lost, bwo?", "twentynineteen"); ?></h2>
					<h3 class="page-trisubtitle"><?php _e( "Bwoooo....", "twentynineteen"); ?></h3>
				</header><!-- .page-header -->

				<!-- TESTING: render image from image library to our template file -->
				<?php
				/** NOTE: Qq'choses importantes à noter
				 * on utilise la fonction wp_get_attachment_image() pour rendre l'image visible
				 * IMPORTANT: n'oubliez pas de "echo" pour afficher effectivement l'image
				 * faire passer le curseur pour voir les arguments de la fonction (c'est pas du tout compliqué)
				 * attention: pour la premier paramètre, le chiffre ID de l'image peut être trouvé en consultant le lien de l'image dans le Media Library
				 * en plus, on utilise pas le troisième paramètre. par conséquent, je mets la valeur de "null"
				 * pour exemple, le premier image contient un chiffre ID de 55 parce que le lien avec lequel elle est associée est:
				 * http://localhost/wp-child-theme-development/wp-admin/upload.php?item=55
				 */
					const ATTR_ARRAY = array("class" => "test-tings");
					const ATTR_ARRAY_2 = array("class" => "again-test-tings");

					echo wp_get_attachment_image(55, "wide", null, ATTR_ARRAY);
					echo wp_get_attachment_image( 57, "thumbnail", null, ATTR_ARRAY_2);
				?>
				<!-- PASS -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
