<?php
/**
 * Theme Header.
 */
?><!doctype html/>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ) ?>">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>
		<header class="rsbs-primary-header-menu">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xs-6 col-md-4 rsbs-logo justify-flex-start">
						<?php
							$rsbs_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $rsbs_logo_id, 'full' );
							if ( has_custom_logo() ) {
								printf(
									'<a href="%1$s"><img src="%2$s" /></a>',
									esc_url( home_url() ),
									esc_url( $logo[0] )
								);
							} else {
								echo $blog_info( 'name' );
							}
						?>

					</div>
					<nav class="col-xs-6 col-md-8 rsbs-menu-navbar justify-flex-end">
						<?php
							if ( has_nav_menu( 'primary' ) ) :
								wp_nav_menu( [
									'theme_location' => 'primary',
									'container'      => false,
									'menu_class'     => 'rsbs-menu',
									'menu_id'        => 'rsbs-menu',
									'depth'          => 2
								] );
							else :
								printf(
									'<a href="%1$s">%2$s</a>',
									esc_url( admin_url( '/nav-menus.php' ) ),
									esc_html__( 'Asign a menu', 'rs-barber-shop' )
								);
							endif;
						?>
						<span id="rsbs-menu-toggler-icon" class="rsbs-menu-toggle-icon material-symbols-outlined">menu</span>
						<!-- For the reference -->
						<!-- <ul id="rsbs-menu" class="rsbs-menu">
							<li class="rsbs-nav-item"><a href="#" class="rsbs-nav-link">Home</a></li>
							<li class="rsbs-nav-item"><a href="#" class="rsbs-nav-link">About</a></li>
						</ul> -->
					</nav>
				</div>
			</div>
		</header>