<?php
/*
 Template Name: Staff Page
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
				{yoast_breadcrumb( '<div id="breadcrumbs">' ,'</div>'); } ?>

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php $postid = get_the_ID(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">

									<?php the_content(); ?>

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

						<div class="bios-outer page-section">

							<p class="instruction">To see full bios, click on the picture or the name of the staff member.</p>

								<?php if( have_rows('bios') ): ?>

									<ul class="bios cf">

										<?php while( have_rows('bios') ): the_row(); 

											// vars
											$name = get_sub_field('name');
											$title = get_sub_field('title');
											$photo = get_sub_field('photo');
											$email = get_sub_field('email');
											// $phone = get_sub_field('phone');
											$bio = get_sub_field('bio');
									
											?>

										<li class="bio cf">

											<div class="bio-photo">

												<a class="js-open-modal" href="javascript:void(0);" data-modal-id="popup"><img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" /></a>

											</div>

											<div class="bio-wrap">

												<div class="bio-meta">
				
													<h3><a class="js-open-modal" href="javascript:void(0);" data-modal-id="popup"><?php echo $name; ?></a></h3>
													<h4 class="staff-title"><span class="bio-title"><?php echo $title; ?></span></h4>
							
													<h4 class="h4-email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h4>
													<!-- <h5><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></h5> -->

												</div>

											</div>

		    								<div id="popup" class="bio-content modal-box">

												<a href="javascript:void(0);" class="js-modal-close x-close close">×</a>

													<h3><?php echo $name; ?></h3>

													<div class="popup-photo">
														
														<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
													
													</div>

													<?php echo $bio; ?>

													<a href="javascript:void(0);" class="x-close puente-btn">Close</a>

											</div>

										</li>

										<?php endwhile; ?>

									</ul>

								<?php endif; ?>

						</div>

				</div>

			</div>


<?php get_footer(); ?>
