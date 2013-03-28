<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="chrome-1">
	<meta name="viewport" content="width=device-width">
	<title>
	<?php if ( function_exists( 'is_tag' ) && is_tag() ) {
		single_tag_title( 'Tag Archive for &quot;' ); echo '&quot; - ';
	} elseif ( is_archive() ) {
		wp_title( '' ); echo 'Archive - ';
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
	} elseif ( !( is_404() ) && ( is_single() ) || ( is_page() ) ) {
		wp_title( '' ); echo ' - ';
	} elseif ( is_404() ) {
		echo 'Not Found - ';
	}
	if ( is_home() ) {
		bloginfo( 'name' ); echo ' - '; bloginfo( 'description' );
	} else {
		bloginfo( 'name' );
	}
	if ( $paged > 1 ) {
		echo ' - page '. $paged;
	}?>
	</title>

	<link rel="shortcut icon" href="<?php print IMAGES; ?>/favicon.ico">
	<link rel="author" href="https://plus.google.com/110711903987736923620/posts">

	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
	<![endif]-->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<?php wp_head(); ?>
</head>

<body class="light">
<!-- [if lt IE 9]>
 	<div class="chromeframe">
        <p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser right now</a> to improve your experience.</p>
    </div>
<![endif]-->
<header>
	<section id="menu-panel" class="menu-panel">
		<div class="content">
			<?php 
				if ( function_exists( 'wp_nav_menu' ) ) :
						wp_nav_menu(
								array(
									'menu'		=> 'primary_nav',
									'container'	=> '',
									'depth'		=> 1,
									'menu_id'	=> 'menu')
						);
				else :
			?>

			<ul>
				<?php wp_list_pages( 'title_li=&depth=1' ); ?>
			</ul>
		<?php endif; ?>
			<?php get_search_form(); ?>
		</div>
	</section>
	<p class="pull">
		<a href="#">&#9660;</a>
	</p>
	<div class="content">
		<h1 class="logo"><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
</header>

<section class="main">