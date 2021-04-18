<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbstarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail() && !is_single()) : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<div class="wpbstarter-featured-content">
				<?php the_post_thumbnail( 'wpbstarter-blog' ); ?>
			</div>
		</a>
	<?php endif; ?>
	<?php if(!is_single()) : ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				wpbstarter_posted_on();
				wpbstarter_posted_by();
				wpbstarter_posted_comment();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
<?php endif; ?>

<?php if(is_single()) : ?>

	<?php wpbstarter_post_thumbnail(); ?>

<?php endif; ?>

	<div class="entry-content ulol">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpbstarter' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbstarter' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<div class="clearfix"></div>
	<footer class="entry-footer">
		<?php wpbstarter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
