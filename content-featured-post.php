<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

	$title = get_the_title();
	$id = get_the_ID();

	echo $title . " i am <br/>";  
	echo "ID saya " . $id;  


	?>			

	<!-- <a class="post-thumbnail" href="<?php //echo esc_url( home_url( '/' ) ); ?>countrys/">  -->
	<!-- <a class="post-thumbnail" href="<?php the_permalink(); ?>"> -->

	<?php 

		switch ( $title ) {
			case 'Post One':

				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . 'countrys/">';

				break;
			case 'Post Two':
				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . 'moods/happy/">';
				break;
			case 'Post Three':
				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . 'moods/sad/">';
				break;
			case 'Post Four':
				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . 'type/video/">';
				break;
			case 'Post Five':
				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . 'category/homepage/">';
				break;
			case 'Post Six':
				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . 'tag/featured/">';
				break;
			default:
				echo '<a class="post-thumbnail" href="' . esc_url( home_url( '/' )) . '>';
				break;
		}

	?>

	<?php
		// Output the featured image.
		if ( has_post_thumbnail() ) :
			if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) {
				the_post_thumbnail();
				echo "I am";
				echo get_the_title();
			} else {
				the_post_thumbnail( 'twentyfourteen-full-width' );
			}
		endif;
	?>
	</a>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','[ I am ]</a></h1>' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
