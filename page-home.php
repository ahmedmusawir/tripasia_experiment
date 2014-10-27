<?php 
/**
*
* Template Name: None
*
**/

?>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<ul id="mygrid">
			<?php
			/*==========================================================
			=            This is my Shit from wp codex site            =
			==========================================================*/
			
			$args = array(
				'posts_per_page'   => 15,
				'offset'           => 0,
				'category'         => '',
				'category_name'    => 'homepage',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

			 // $posts_array = get_posts( $args );
			
			/*-----  End of This is my Shit from wp codex site  ------*/

				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<li class="col-lg-4 col-md-6 col-sm-6">	
				<?php
					do_action( 'sequel_front_posts_before' ); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						    <a class="post-thumbnail" href="<?php the_permalink(); ?>">
						        <?php
							    // Output the home-grid image.
							    if ( has_post_thumbnail() ) :
								    the_post_thumbnail();
							    endif;
						        ?>
						    </a>

						    <header class="entry-header">
							    <?php 
								    the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
								    
									<p><?php echo sequel_grid_excerpt(); ?></p>
								
								
						    </header><!-- .entry-header -->
					        </article><!-- #post-## -->
							<?php 
							/**
							 * Fires after the Sequel front content.
							 *
							 * @since Sequel 1.0
							 */
					do_action( 'sequel_front_posts_after' );

				?>

				</li>
				
				<?php endforeach; 
				wp_reset_postdata(); ?>

		</ul>

			
				<!-- <div id="primary" class="content-area"> -->
					<!-- <div id="content" class="site-content" role="main"> -->

						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								// Include the page content template.
								get_template_part( 'content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							endwhile;
						?>

					<!-- </div> -->
					<!-- #content -->
				<!-- </div> -->
				<!-- #primary -->

			</div>
			<!-- #content -->
		</div>
		<!-- #primary -->
		<?php //get_sidebar( 'content' ); ?>
	</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
