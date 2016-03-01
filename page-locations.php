<?php
/*
 Template Name: Locations Page
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

				<?php if ( function_exists('yoast_breadcrumb') ) 
				{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

								
									?>
								</section>


								<footer class="article-footer">

                  

								</footer>


							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<section class="locations-outer">

							<?php 

							// Location widget template for the ACF Widgets plugin.
							
							// Grab our repeater field
							if( have_rows('locations_page') ): ?>

								<ul class="locations-list">

									<?php $count = 0; // start our count for our map ID selectors, otherwise Google has a fit ?>

									<?php while( have_rows('locations_page') ): the_row(); 

									$count++; // increase the count after each loop

										// vars
										$name = get_sub_field('name');
										$address = get_sub_field('address');
										$map = get_sub_field('map');
										// $link = get_sub_field('link');
										$hours = get_sub_field('hours');
								
										?>

									<li class="location-list">

										<h4 class="widgettitle"><?php echo $name; ?></h4>

											<p><?php echo $address; ?></p>

											<div class="google-map">

												<?php if( ! empty($map) ): ?>
			
													<?php echo $map; ?>
			
												<?php endif; ?> 

											</div>

											<div class="location-hours">
				
												<?php echo $hours; ?>

											</div>

									</li>

								<?php endwhile; ?>

							</ul>
							
							<?php endif; ?>
							
							<p class="small">These hours are for August – June. For summer hours, please call the office.</p>


						</section>
						

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
</script>