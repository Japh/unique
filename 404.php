<?php
/**
 * 404 Template
 *
 * The 404 template is used when a reader visits an invalid URL on your site. By default, the template will 
 * display a generic message.
 *
 * @package Unique
 * @subpackage Functions
 * @since 0.1.0
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2012, Justin Tadlock
 * @link http://themehybrid.com/hybrid-core
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // unique_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // unique_open_content ?>

		<div class="hfeed">

			<article id="post-0" class="<?php hybrid_entry_class(); ?>">

				<header class="entry-header">
					<h1 class="error-404-title entry-title"><?php _e( 'Whoah! You broke something!', 'unique' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<p>
						<?php printf( __( "Just kidding! You tried going to %s, which doesn't exist, so that means I probably broke something.", 'unique' ), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?>
					</p>
					<p>
						<?php _e( "The following is a list of the latest posts from the blog. Maybe it will help you find what you're looking for.", 'unique' ); ?>
					</p>

					<ul>
						<?php wp_get_archives( array( 'limit' => 20, 'type' => 'postbypost' ) ); ?>
					</ul>

				</div><!-- .entry-content -->

			</article><!-- .hentry -->

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // unique_close_content ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // unique_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>