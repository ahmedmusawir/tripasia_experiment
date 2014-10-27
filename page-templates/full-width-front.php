<?php
/**
 * Template Name: Full Width Front Page
 *
 * @package Sequel
 * @since Sequel 1.0.0
 */

get_header(); ?>

<div id="main-content" class="main-content ">

<?php
if ( get_theme_mod( 'featured_content_location' ) == 'default' ) {
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
} ?>

	<div id="primary" class="content-area ">
		<div id="content" class="site-content " role="main">


		<ul id="mygrid" class="container">
			<?php
			/*==========================================================
			=            This is my Shit from wp codex site            =
			==========================================================*/
			
			$args = array(
				'sort_order' => 'DESC',
				'sort_column' => 'post_title',
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'meta_key' => '',
				'meta_value' => '',
				'authors' => '',
				'child_of' => 19,
				'parent' => -1,
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'page',
				'post_status' => 'publish'
			); 

			 // $posts_array = get_posts( $args );
			
			/*-----  End of This is my Shit from wp codex site  ------*/

				$country_pages = get_pages( $args );

				// print_r($country_pages);

				foreach ( $country_pages as $page ) : ?>

				<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">	
				<?php
					do_action( 'sequel_front_posts_before' ); ?>

							<article id="post-<?php echo $page->ID; ?>" <?php post_class(); ?>>
						    <a class="post-thumbnail" href="<?php echo get_page_link( $page->ID ); ?>">
						    
						    	<?php echo get_the_post_thumbnail( $page->ID ); ?>
						        
						    </a>
								
						    <header class="entry-header">
						    <?php if ( $page->post_title == 'Singapore' ) :  ?>

								<h1 class="entry-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>countrys/"><?php echo $page->post_title; ?></a></h1>
									<p>
										<?php 

											$the_excerpt = $page->post_excerpt; 
											echo $the_excerpt; 

										?>
									</p>

							<?php else: ?>	
							   
								<h1 class="entry-title"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h1>
								<?php 
									// echo $page->ID;
									// echo $page->post_title; //case sensetive
									// print_r($page);
									 echo esc_url( home_url( '/' ) ); 
								 ?>
								    
									<p>
										<?php 

											$the_excerpt = $page->post_excerpt; 
											echo $the_excerpt; 

										?>
									</p>
								
							<?php endif ?>
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
		

			<div id="primary" class="content-area front-page-content-area">
					<div id="content" class="site-content" role="main">

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

					</div><!-- #content -->
				</div><!-- #primary -->
		
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();
