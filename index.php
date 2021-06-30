<?php
/**
 * Homepage template
 *
 * @package Opti
 */

get_header();

$display_categories = opti_get_homepage_categories();

$showposts = (int) opti_option( 'featured-posts' );

$recent_colwidth = 'ninecol';
if ( empty( $display_categories ) ) {
	$recent_colwidth = 'twelvecol';
}?>

<section class="row">
	<div class="<?php opti_content_class(); ?>">
		<?php
		$paged = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;
		$page_title = esc_html__( 'Recent Posts', 'opti' );

		if ( 1 === $paged ) {
			get_template_part( 'includes/featured' );
		} else {
			$page_title = sprintf( __( 'Recent Posts - page %d', 'opti' ), $paged );
		}

		$display_apidemiologia_em_foco = array(0 => "134"); // Categoria Epidemiologia em foco
		$exclude = array();
		foreach ( (array) $display_apidemiologia_em_foco as $category ) {
			$cat_query = new WP_Query(
				array(
					'posts_per_page' => $showposts,
					'cat' => (int) $category,
					'post__not_in' => $exclude,
				)
			);?>
			<div id="recent-posts" class="<?php echo esc_attr( $recent_colwidth ); ?>">
				<h3>
					<a class="dark" href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php printf( esc_html__( '%s', 'opti' ), get_cat_name( $category ) ); ?></a>
				</h3>
				<ul id="recent-excerpts">

					<?php
					if ( $cat_query->have_posts() ) {?>
						<ul>
							<?php
							while ( $cat_query->have_posts() ) {
								$cat_query->the_post();
								$exclude[] = $cat_query->post->ID;
								get_template_part( 'content', 'home-loop' );
							}
					}?>
					</ul>
				</div>
		<?php
		}

		if ( $display_categories && is_array( $display_categories ) ) {?>
			<aside class="fourcol last">
					<?php
					$exclude = array();
					foreach ( (array) $display_categories as $category ) {
						$cat_query = new WP_Query(
							array(
								'posts_per_page' => $showposts,
								'cat' => (int) $category,
								'post__not_in' => $exclude,
							)
						);?>
						<section class="widget">
							<div class="widget-wrap">
								<h3 class="widgettitle">
									<a class="dark" href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php printf( esc_html__( '%s', 'opti' ), get_cat_name( $category ) ); ?></a>
								</h3>
								<?php
								if ( $cat_query->have_posts() ) {?>
									<ul>
										<?php
										while ( $cat_query->have_posts() ) {
											$cat_query->the_post();
											$exclude[] = $cat_query->post->ID;?>
											<li>
												<a class="dark" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'opti' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
												<div class="date"><?php the_time( get_option( 'date_format' ) ); ?></div>
											</li>
										<?php
										}?>
									</ul>
								<?php
								}?>
							</div>
						</section>
						<?php
						wp_reset_postdata();
					}?>
			</aside>
		<?php
		}?>
	</div>
	<?php get_sidebar(); ?>
</section>

<?php get_footer();
