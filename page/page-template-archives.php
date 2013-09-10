<?php
/**
 * Template Name: Archives
 *
 * @package Unique
 * @subpackage Template
 * @since 0.1.0
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2012, Justin Tadlock
 * @link http://themehybrid.com/themes/unique
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // unique_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // unique_open_content ?>

		<div class="hfeed">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // unique_before_entry ?>

					<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // unique_open_entry ?>

						<header class="entry-header">
							<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_content(); ?>

							<?php if ( function_exists( 'smartArchives' ) ) : smartArchives( 'both', '' ); ?>

							<?php elseif ( function_exists( 'wp_smart_archives' ) ) : wp_smart_archives(); ?>

							<?php elseif ( function_exists( 'srg_clean_archives' ) ) : srg_clean_archives(); ?>

							<?php else : ?>

								<h2><?php _e( 'Archives by category', 'unique' ); ?></h2>

								<ul class="xoxo category-archives">
									<?php wp_list_categories( array( 'feed' => __( 'RSS', 'unique' ), 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false ) ); ?>
								</ul><!-- .xoxo .category-archives -->

								<h2><?php _e( 'Archives by month', 'unique' ); ?></h2>

								<ul class="xoxo monthly-archives">
									<?php wp_get_archives( array( 'show_post_count' => true, 'type' => 'monthly' ) ); ?>
								</ul><!-- .xoxo .monthly-archives -->

							<?php endif; ?>

							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'unique' ), 'after' => '</p>' ) ); ?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
						</footer><!-- .entry-footer -->

						<?php do_atomic( 'close_entry' ); // unique_close_entry ?>

					</article><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // unique_after_entry ?>

					<?php do_atomic( 'after_singular' ); // unique_after_singular ?>

					<?php comments_template( '/comments.php', true ); // Loads the comments.php template. ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // unique_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // unique_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>