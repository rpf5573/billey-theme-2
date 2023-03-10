<?php
$gallery = Billey_Helper::get_post_meta( 'portfolio_gallery', '' );

$class = 'entry-portfolio-content-wrap';

if ( $gallery !== '' || has_post_thumbnail() ) {
	$class .= ' col-md-push-1 col-md-4';
} else {
	$class .= ' col-md-12';
}
?>

<div class="row tm-sticky-parent">
	<?php if ( $gallery !== '' || has_post_thumbnail() ) : ?>
		<div class="col-md-7">
			<div class="tm-sticky-column">

				<div class="entry-portfolio-feature-wrap">

					<?php Billey_Portfolio::instance()->entry_video( array( 'position' => 'above' ) ); ?>

					<div class="entry-portfolio-feature">

						<?php
						$caption_enable = Billey::setting( 'single_portfolio_feature_caption' );
						$caption_enable = $caption_enable === '1' ? true : false;
						?>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="entry-portfolio-image">
								<?php
								Billey_Image::the_post_thumbnail( array(
									'size'           => 'custom',
									'width'          => 670,
									'height'         => 9999,
									'crop'           => false,
									'caption_enable' => $caption_enable,
								) );
								?>
							</div>
						<?php endif; ?>

						<?php if ( $gallery !== '' ) : ?>
							<?php foreach ( $gallery as $key => $value ) { ?>
								<div class="entry-portfolio-image">
									<?php Billey_Image::the_attachment_by_id( array(
										'id'             => $value['id'],
										'size'           => 'custom',
										'width'          => 670,
										'height'         => 9999,
										'crop'           => false,
										'caption_enable' => $caption_enable,
									) );
									?>
								</div>
							<?php } ?>
						<?php endif; ?>

					</div>

					<?php Billey_Portfolio::instance()->entry_video( array( 'position' => 'below' ) ); ?>

				</div>

			</div>
		</div>
	<?php endif; ?>

	<div class="<?php echo esc_attr( $class ); ?>">
		<div class="tm-sticky-column">
			<div class="entry-portfolio-content">
				<h3 class="entry-portfolio-title"><?php the_title(); ?></h3>

				<div class="entry-portfolio-description">
					<?php the_content(); ?>
				</div>

				<?php Billey_Portfolio::instance()->entry_details(); ?>

				<?php Billey_Portfolio::instance()->entry_share(); ?>

				<?php Billey_Portfolio::instance()->entry_project_link(); ?>
			</div>
		</div>
	</div>
</div>
