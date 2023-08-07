const menuToggler = document.getElementById( 'rsbs-menu-toggler-icon' );
const menuWrapper = document.getElementById( 'rsbs-menu' );

menuToggler.addEventListener( 'click', ( e ) => {
	menuToggler.innerHTML = 'menu';
	if ( menuWrapper) {
		menuWrapper.classList.toggle( 'on' );
		if ( menuWrapper.classList.contains( 'on' ) ) {
			menuToggler.innerHTML = 'close';
		}
	}
} );