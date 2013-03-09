</section>

<footer>
	<div class="content cf">
		<section class="footer-widget">
			<ul class="sidebar">
				<?php if ( is_active_sidebar( 'footer-widgets-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widgets-1' ); ?>
				<?php endif; ?>
			</ul>
		</section>
		<section class="footer-widget">
			<ul class="sidebar">
				<?php if ( is_active_sidebar( 'footer-widgets-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widgets-2' ); ?>
				<?php endif; ?>
			</ul>
		</section>
		<section class="footer-widget">
			<ul class="sidebar">
				<?php if ( is_active_sidebar( 'footer-widgets-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widgets-3' ); ?>
				<?php endif; ?>
			</ul>
		</section>
		<div class="copyright">
			<p>&copy; Lucas, 2013 - Proudly powered by <a href="http://wordpress.org" target="_blank">WordPress!</a></p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>