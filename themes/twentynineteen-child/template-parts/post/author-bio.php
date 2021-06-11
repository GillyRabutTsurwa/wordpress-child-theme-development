<?php
/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

if ( (bool) get_the_author_meta( 'description' ) ) : ?>
<div class="author-bio">
	<h2 class="author-title">
		<span class="author-heading">
				<?php
					printf(
						/* translators: %s: Post author. */
						__( 'Published by %s', 'twentynineteen' ),
						esc_html( get_the_author() ) 
					);
				?>
		</span>
	</h2>
	<div class="author-image-n-description-container">
		<div class="author-image">
			<?php //NEW:
				echo get_avatar(get_the_author_meta("ID"), 24); 
			?>
		</div>
		<p class="author-description">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-description -->
	</div>
</div><!-- .author-bio -->
<?php endif; ?>
