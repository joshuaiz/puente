<?php
/*
 Template Name: Events Page
 *
*/
?>

<?php get_header(); ?>

			<div id="content">

			<header class="page-header">
	
					<div class="page-inner-header wrap cf">
	
						<?php $postid = get_the_ID(); ?>
	
						<?php $spanish = get_field('spanish_title', $postid); ?>
	
						<h1 class="page-title"><?php the_title(); ?> <span class="separator">|</span> <?php echo $spanish; ?></h1>
	
					</div>
	
				</header>

				<div id="inner-content" class="wrap cf">

					<?php if ( function_exists( 'yoast_breadcrumb' ) ) 
				{ yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' ); } ?>

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();
									?>
								</section>



							</article>

							<?php endwhile; else : ?>


							<?php endif; ?>

						</main>




				</div>

				<section class="event-list-outer">

					<section class="event-list-inner wrap cf">

						<?php 

						// WP_Query arguments
						$args = array (
							'post_type'              => array( 'puente_events' ),
							'post_status'            => array( 'publish' ),
							'meta_key'	=> 'date',
							'orderby'	=> 'meta_value_num',
							'order'		=> 'ASC'
						);
						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								
								// vars 
								$image = get_field('image');
								$desc = get_field('description');
								$date = get_field('date');
								$time = get_field('time');
								$map = get_field('location');
								$location = get_field('event_location');

								?>



								<div class="event-outer">

								<div class="event-image">

									<?php if( !empty($image) ): ?>

										<a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>

									<?php endif; ?>

								</div>

								<div class="event-inner">

									<div class="event-meta">

										<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>

										<h4><?php echo $date; ?> | <?php echo $time; ?></h4>

										<div class="event-location">

											<?php echo $location; ?>

										</div>
										

									</div>

									<div class="event-description">

										<?php echo $desc; ?>

									</div>

								</div>


							</div>

							<?php }
						} else {
							// no posts found
						}
						
						// Restore original Post Data
						wp_reset_postdata();



						?>

					</section>

				</section>

			</div>


<?php get_footer(); ?>

<script>
jQuery(document).ready(function($){
	$('.google-map').click(function () {
    $('.google-map iframe').css("pointer-events", "auto");
});

$( ".google-map" ).mouseleave(function() {
  $('.google-map iframe').css("pointer-events", "none"); 
});
});
</script>