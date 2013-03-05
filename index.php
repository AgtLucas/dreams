<?php

get_header(); 
error_reporting(0); 

?>

	<div class="content">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

		<article class="post-page" id="post-<?php the_ID(); ?>">
			<h2 class="post-page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<small class="date"><?php the_time( 'F j, Y' ); ?></small>
				<?php the_content( 'Read More' ); ?>
		</article>

			<?php endwhile; ?>
		<?php else : ?>

		<section class="error">
			<div class="content">
				<h1>Nothing Found!</h1>
				<?php get_search_form(); ?>
			</div>
		</section>

	<?php endif; ?>

	<?php 

		if ( function_exists( 'pagination' ) ) {
			pagination( $additional_loop->max_num_pages );
		}

	?>

	</div><!-- end .content -->
<?php get_footer(); ?>