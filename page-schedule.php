<?php
/*
 Template Name: Schedule Page
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

						<section class="schedule-outer page-section">

							<?php // grab our ACF Repeater loop (on Schedules page) ?>

							<?php if( have_rows('schedules') ): ?>

								<ul class="schedules">

									<?php while( have_rows('schedules') ): the_row(); 

										// vars
										$title = get_sub_field('title');
										$table = get_sub_field('shortcode');
								
										?>
			
										<li class="schedule-table">
			
											<h3><?php echo $title; ?></h3>
			
											<?php echo do_shortcode($table); ?>
			
										</li>

									<?php endwhile; ?>

								</ul>

							<?php endif; ?>

						</section>

				</div>

			</div>

<?php get_footer(); ?>
