<?php

if ( is_active_sidebar( 'shop-sidebar' ) && ! is_single() ) {

?>
	<aside id="sidebar" class="woocommerce-sidebar">

		<?php
		if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'shop-sidebar' ) ) :
else :

		endif;
		?>

		<div class="clearfix"></div>
	</aside>
<?php
}// End if().
?>
