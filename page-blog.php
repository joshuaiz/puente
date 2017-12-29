<?php
/*
 Template Name: Blog Page
 *
 * 
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<section class="posts-outer">

						    <section class="posts-inner">

						    	<h2>Recent PUENTE Posts</h2>

								<ul class="posts-list nostyle cf">
						    	<?php
						    	// WP_Query arguments
								$args = array(
									'post_type'              => array( 'post' ),
									'post_status'            => array( 'publish' ),
								);
								
								// The Query
								$query = new WP_Query( $args );
								
								// The Loop
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										// do something
										?>
										<li class="post-list cf">
										<div class="post-image">

											<?php if ( has_post_thumbnail() ) : ?>
											    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											        <?php the_post_thumbnail(); ?>
											    </a>
											<?php endif; ?>

										</div>
										<div class="post-content">
											<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>

											<?php the_excerpt(); ?>

										</div>
										</li>

									<?php }
								} else {
									// no posts found
								}
								
								// Restore original Post Data
								wp_reset_postdata();


						    	?>

						    	</ul>
						    
						    </section>
						
						</section>

						</main>

						

				</div>

			</div>


<?php get_footer(); ?>
