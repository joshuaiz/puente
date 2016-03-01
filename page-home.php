<?php
/*
 Template Name: Home Page
*/
?>

<?php get_header(); ?>

			<div id="content">

			<div class="soliloquy-outer">

				<?php if ( function_exists( 'soliloquy' ) ) { soliloquy( 'home-slider', 'slug' ); } ?>

				

			</div>

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title">Welcome to PUENTE Learning Center!</h1>

									


								</header>

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

					</div><?php // end inner-content ?>



					<section class="parallax-outer cf">

						<?php 

						// vars
						$image = get_field('background_image');
						// $content = get_field('background_content');
						$rows = get_field('quotes' ); // get all the rows
						$rand_row = $rows[ array_rand( $rows ) ]; // get a random row
						$rand_row_quote = $rand_row['quote' ]; // get the sub field value 
						$rand_row_author = $rand_row['quote_author'];
						$rand_row_title = $rand_row['author_title'];

						?>

						<div class="fullscreen background parallax" style="background-image:url(<?php echo $image['url']; ?>" data-img-width="1600" data-img-height="1064" data-diff="100">
    						
    						<div class="content-a">
        						<div class="content-b">
        							<?php echo $rand_row_quote; ?>
        							<div class="quote-author">— <?php echo $rand_row_author; ?>, <span><?php echo $rand_row_title; ?></span></div>

        						</div>
						    </div>
						</div>
					</section>


					<div id="inner-content2" class="wrap cf">

						<section class="programs-outer m-all t-all d-all cf">

						<?php 
							
						$field_name = "programs";
						$field = get_field_object($field_name);

						?>

						<h2><?php echo $field['label']; ?> <span class="separator">|</span> Programas</h2>

							<?php if( have_rows('programs') ): ?>

								<ul class="programs">

									<?php while( have_rows('programs') ): the_row(); 

									// vars
									$image = get_sub_field('program_image');
									$size = 'medium'; // (thumbnail, medium, large, full or custom size)
									$desc = get_sub_field('program_description');
									$title = get_sub_field('program_title');
									$link = get_sub_field('program_link');
							
									?>
							
									<li class="program">

										<h3>

										<?php if( $link ): ?>
										
											<a href="<?php echo $link; ?>">
										
										<?php endif; ?>

											<?php echo $title; ?>

										<?php if( $link ): ?>
											</a>
										<?php endif; ?>

										</h3>
							
										<?php if( $link ): ?>
											<a href="<?php echo $link; ?>">
										<?php endif; ?>

											<?php echo wp_get_attachment_image( $image, $size ); ?>

										<?php if( $link ): ?>
											</a>
										<?php endif; ?>

											<?php echo $desc; ?>

									</li>

									<?php endwhile; ?>

								</ul>

							<?php endif; ?>

						</section>

						<section class="links-outer">

						<?php if( have_rows('home_links') ): ?>

							<ul class="links">

								<?php while( have_rows('home_links') ): the_row(); 

								// vars
								$link = get_sub_field('link');
								$text = get_sub_field('link_text');

								?>

								<li class="link">

									<?php if( $link ): ?>
										<a class="big-btn" href="<?php echo $link; ?>">
									<?php endif; ?>

										<?php echo $text; ?>

									<?php if( $link ): ?>
										</a>
									<?php endif; ?>

								</li>

								<?php endwhile; ?>

							</ul>

						<?php endif; ?>

						</section>

			</div>

<?php get_footer(); ?>
