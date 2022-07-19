<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<?php $type_headings = get_theme_mod('type_headings',array('font-family'=> 'Lato','variant' => '700'));
	$type_texts = get_theme_mod('type_texts', array('font-family'=> 'Lato','variant' => '400')); ?>

	<style>
		body {
			font-family: <?php echo $type_headings['font-family'] ?>, sans-serif;
			<?php if ($type_headings['variant'] == 'regular') {
				echo 'font-weight: 400';
			} elseif ($type_headings['variant'] == 'italic') {
				echo 'font-weight: 400';
				echo 'font-style: italic';
			} else {
				echo $type_headings['variant'];
			} ?>;
			font-family: <?php echo $type_texts['font-family'] ?>, sans-serif;
			<?php if ($type_texts['variant'] == 'regular') {
				echo 'font-weight: 400';
			} elseif ($type_texts['variant'] == 'italic') {
				echo 'font-weight: 400';
				echo 'font-style: italic';
			} else {
				echo $type_texts['variant'];
			} ?>;
		}
	</style>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'flatsome_after_body_open' ); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

	<?php do_action( 'flatsome_before_header' ); ?>

	<header id="header" class="header <?php flatsome_header_classes(); ?>">
		<div class="header-wrapper">
			<?php get_template_part( 'template-parts/header/header', 'wrapper' ); ?>
		</div>
	</header>

	<?php do_action( 'flatsome_after_header' ); ?>

	<main id="main" class="<?php flatsome_main_classes(); ?>">
