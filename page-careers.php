<?php
/*
 Template Name: Careers Page
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

				<section class="careers-outer">

					<section class="careers-inner wrap cf">


					<ul class="nostyle careers-list">

						<?php 

						// WP_Query arguments
						$args = array (
							'post_type'              => array( 'careers' ),
							'post_status'            => array( 'publish' ),
							'order'                  => 'ASC',
						);


						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								
								// vars 
								$intro = get_field('intro');
								$resp = get_field('responsibilities', false, false);
								$experience = get_field('experience', false, false);
								$skills = get_field('skills', false, false);
								$deadline = get_field('deadline');
								$sig = get_field('signature');

								?>



								<li class="career-outer">

								

								<div class="career-inner">

									<h2><?php the_title(); ?></h2>

									<div class="career-intro">

										<?php echo $intro; ?>

									</div>

									<div class="career-responsibilities">

									<?php $field = get_field_object('responsibilities'); ?>

									<h3><?php echo $field['label']; ?></h3>

										<?php echo $resp; ?>

									</div>

									<div class="career-experience">

									<?php $field = get_field_object('experience'); ?>

									<h3><?php echo $field['label']; ?></h3>

										<?php 
										$lines = explode("\n", $experience); // or use PHP PHP_EOL constant
										if ( !empty($lines) ) {
										  echo '<ul class="list-square">';
										  foreach ( $lines as $line ) {
										    echo '<li>'. trim( $line ) .'</li>';
										  }
										  echo '</ul>';
										}
										?>


									</div>

									<div class="career-skills">

									<?php $field = get_field_object('skills'); ?>

									<h3><?php echo $field['label']; ?></h3>

										<?php 
										$lines = explode("\n", $skills); // or use PHP PHP_EOL constant
										if ( !empty($lines) ) {
										  echo '<ul class="list-square">';
										  foreach ( $lines as $line ) {
										    echo '<li>'. trim( $line ) .'</li>';
										  }
										  echo '</ul>';
										}
										?>


									<div>

									<div class="career-deadline">


										<?php echo $deadline; ?>

									</div>

									<div class="career-signature">

										<?php echo $sig; ?>

									</div>

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

			</div>


<?php get_footer(); ?>
