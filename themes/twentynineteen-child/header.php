<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- NOTE: 
	* on fait une classe dynamique ici (dans le div dessous)
	* si on se trouve dans la page d'erreur (une page 404), rendre la classe "ERRORPAGE" sinon, ne rendre aucune classe 
-->
<div id="page" class="site <?php echo is_404() ? 'error-page' : null ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

	<!-- TODO: 
		* si on se trouve dans la page erreur ET le menu est enregistré avec un lieu specifique
		* on affiche ce menu dessous
	-->
	<?php if ( is_404() && has_nav_menu( 'menu-1' ) ) : ?>
		<!-- NOTE:
			* en affichant ce menu, on va verifier à nouveau:
			* si on se trouve dans la page d'erreur, rendre la classe "error-nav" sur l'élément de navigation
			* sinon, ne rendre aucune classe
		*/ -->
		<nav id="site-navigation" class="main-navigation <?php echo is_404() ? 'error-nav' : null ?>" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_class'     => 'main-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)
				); 
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>

	<!-- NOTE: finalement, si on se trouve pas dans la page d'erreur, afficher le code général -->
	<?php if ( !is_404() ) : ?>
		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

				<div class="site-branding-container">
					<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				</div><!-- .site-branding-container -->
				
				
				<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
					<div class="site-featured-image">
						<?php
						twentynineteen_post_thumbnail();
						the_post();
						$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;
						
						$classes = 'entry-header';
						if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
							$classes = 'entry-header has-discussion';
						}
						?>
					<div class="<?php echo $classes; ?>">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</div><!-- .entry-header -->
					<?php rewind_posts(); ?>
				</div>
				<?php endif; ?>
			</header><!-- #masthead -->

	<?php endif; ?>

	<div id="content" class="site-content">
