<?php
/**
 * Displays content for front page
 *
 * @package Tooba
 * @subpackage Tooba
 * @since 1.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<div class="panel-content">
		<div class="wrap">
			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
						get_the_title()
					) );
				?>
			</div><!-- .entry-content -->
			<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
