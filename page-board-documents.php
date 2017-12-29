<?php
/*
 Template Name: Board Documents Page
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

								<section class="documents-outer">

								    <section class="documents-inner">

								    <?php if( have_rows('documents') ): ?>

										<ul class="documents-list nostyle">
									
										<?php while( have_rows('documents') ): the_row(); 
									
											// vars
											$file = get_sub_field('document');
											
									
											?>
									
											<li class="slide">
									
												<?php 

												if( $file ): ?>
													
													<a href="<?php echo $file['url']; ?>"><img class="document-icon" src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.png" /> <?php echo $file['title']; ?></a>
												
												<?php endif; ?>
									
											</li>
									
										<?php endwhile; ?>
									
										</ul>
									
									<?php endif; ?>
								    
								    </section>
								
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

							

				</div>

			</div>


<?php get_footer(); ?>
