<?php

get_header(); 
error_reporting(0); 

?>

	<div class="content">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

		<article class="post-page" id="post-<?php the_ID(); ?>">
			<h2 class="post-page-title"><?php the_title(); ?></h2>
				<?php the_content(); ?>
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

	</div><!-- end .content -->
<?php get_footer(); ?>