<?php
/**
 * Footer code and content
 *
 * @package Opti
 */

?>		</section>
	</section>
</section>

<footer role="contentinfo">
	<section class="row">
<?php
	if ( is_active_sidebar( 'sidebar-2' ) ) {
		echo '<section class="col">';
		dynamic_sidebar( 'sidebar-2' );
		echo '</section>';
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		echo '<section class="col">';
		dynamic_sidebar( 'sidebar-3' );
		echo '</section>';
	}
	if ( is_active_sidebar( 'sidebar-4' ) ) {
		echo '<section class="col">';
		dynamic_sidebar( 'sidebar-4' );
		echo '</section>';
	}
?>
	</section>
	<section id="footer-wrap">
		<section class="row">
			<div class="left">
<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span class="sep"> | </span>' );
	}
?>
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'opti' ); ?>" rel="generator"><?php printf( esc_html__( 'Proudly powered by %s', 'opti' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'opti' ), 'Opti', '<a href="https://prothemedesign.com/" rel="designer">Pro Theme Design</a>' ); ?>
			</div>
		</section>
	</section>
</footer>

<?php wp_footer(); ?>
</body>
</html>
