<?php
/*
 * Events Custom Post Type - Single
 *
 * 
*/
?>

<?php get_header(); ?>

			<div id="content">

			<?php if ( function_exists( 'yoast_breadcrumb' ) ) 
				{ yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' ); } ?>

			

				<div id="inner-content" class="wrap cf">

				<header class="page-header">

				
	
					<div class="page-inner-header">
	
						
	
						<h1 class="single-title"><?php the_title(); ?></h1>
	
					</div>
	
				</header>

					

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							

								
								<?php // vars 
								$image = get_field('image');
								$desc = get_field('description');
								$date = get_field('date');
								$time = get_field('time');
								$map = get_field('location');

								?>

								<div class="event-outer">

									<div class="event-meta">

										

										<h4><?php echo $date; ?> | <?php echo $time; ?></h4>

										

									</div>

								<div class="event-image">

									<?php if( !empty($image) ): ?>

										<a href="<?php echo $image['url']; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>

									<?php endif; ?>

								</div>

								<div class="event-description">



									<?php echo $desc; ?>


									<div class="event-docs">

									<?php if( have_rows('documents') ): ?>

										<ul class="documents">

											<?php while( have_rows('documents') ): the_row(); 

											// vars
											$file = get_sub_field('file');

											?>

											<li class="document">

												<?php if( $file ): ?>
	
												<a class="puente-btn" href="<?php echo $file['url']; ?>">Download <?php echo $file['title']; ?></a>

												<?php endif; ?>


											</li>

											<?php endwhile; ?>

										</ul>

									<?php endif; ?>

								</div>

									

									

									<div class="google-map">

												<?php if( ! empty($map) ): ?>
			
													<?php echo $map; ?>
			
												<?php endif; ?> 

											</div>

								

								</div>

								

								

							</div>



					</section>

				</section>

						</main>

						<?php get_sidebar(); ?>

				</div>

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

jQuery(document).ready(function($){
	$('#breadcrumbs a:contains("Events")').attr("href", "/events/");
});
</script>