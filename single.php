<?php

get_header(); 
error_reporting(0); 

?>

	<div class="content">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

		<article class="post-page" id="post-<?php the_ID(); ?>">
			<h2 class="post-page-title"><?php the_title(); ?></h2>
			<small class="date"><?php the_time( 'F j, Y' ); ?></small>
				<?php the_content(); ?>

			<section class="cat-tags">
				<span class="cat-links">Categorias <?php the_category( ', ' ); ?></span>
				<span class="tag-links"><?php the_tags(); ?></span>

				<section class="sharing cf">
					<div class="social-network">
						<div class="g-plus" data-action="share"></div>
						<script type="text/javascript">
							window.___gcfg = {lang: 'en-GB'};

							(function() {
							var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							po.src = 'https://apis.google.com/js/plusone.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
							})();
						</script>
					</div>
					<div class="social-network">
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="_agtlucas" data-lang="en">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
					<div class="social-network">
						<div id="fb-root"></div>
						<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo get_permalink(); ?>" data-layout="button_count" show_faces="false" width="150"></fb:like>
					</div>
				</section>
			</section>
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

	<div class="comments-template">
		<?php comments_template(); ?>
	</div>

	</div><!-- end .content -->
<?php get_footer(); ?>