<?php
/**
 * The template for displaying all single portfolio posts.
 *
 * @package Billey
 * @since   1.0
 */
get_header();

$style = Billey_Helper::get_post_meta( 'portfolio_layout_style', '' );
if ( $style === '' ) {
	$style = Billey::setting( 'single_portfolio_style' );
}
?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Billey_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h2 class="screen-reader-text"><?php echo esc_html( get_the_title() ); ?></h2>

							<?php get_template_part( 'template-parts/portfolio/single/style', $style ); ?>
						</article>

						<?php if ( Billey::setting( 'single_portfolio_related_enable' ) === '1' ) : ?>
							<?php get_template_part( 'template-parts/portfolio/related' ); ?>
						<?php endif; ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( Billey::setting( 'single_portfolio_comment_enable' ) === '1' && ( comments_open() || get_comments_number() ) ) :
							comments_template();
						endif;
						?>
					<?php endwhile; ?>
				</div>

				<?php Billey_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>

		<?php Billey_Portfolio::instance()->entry_navigation_links(); ?>
	</div>
<?php
get_footer();
