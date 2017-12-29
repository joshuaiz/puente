<?php
/*
 Template Name: Volunteer Page
 *
 * 
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();
									?>

									<section class="volunteer-outer">

									    <section class="volunteer-inner">

									    	<?php // vars
									    	$gallery = get_field('gallery');
									    	$intro = get_field('intro');
									    	$list = get_field('opportunities_list');
									    	$form = get_field('form');
									    	$formdl = get_field('form_download');

									    	?>

									    	<div class="volunteer-gallery">

									    		<?php echo do_shortcode( $gallery ); ?>

									    	</div>

									    	<div class="intro">

									    		<p><?php echo $intro; ?></p>

									    		<?php $lines = explode("\n", $list); // or use PHP PHP_EOL constant
												if ( !empty($lines) ) {
												  echo '<ul class="list-square">';
												  foreach ( $lines as $line ) {
												    echo '<li>'. trim( $line ) .'</li>';
												  }
												  echo '</ul>';
												}
												?>

									    	</div>

									    	<div class="opportunities-outer">

									    		<?php if( have_rows('opportunities') ): ?>


									    			<h2>Current Volunteer/Intern Opportunities</h2>

													<ul class="opportunities-list">
												
													<?php while( have_rows('opportunities') ): the_row(); 
												
														// vars
														$title = get_sub_field('title');
														$description = get_sub_field('description');
														$file = get_sub_field('file');
												
														?>
												
														<li class="opportunity">
												
															<h3><?php echo $title; ?></h3>

															<p><?php echo $description; ?></p>

															<?php if( $file ): ?>
	
																<a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>

															<?php endif; ?>
												
														</li>
												
													<?php endwhile; ?>
												
													</ul>
												
												<?php endif; ?>

									    	</div>

									    	<div class="volunteer-form">

									    	<h2>Apply for Volunteer/Internship Opportunities</h2>

									    	<p>Either fill out the online form or download the form and turn the completed form to PUENTE.</p>

									    	<?php if( $formdl ): ?>
	
													<a class="puente-btn" href="<?php echo $formdl['url']; ?>">Download <?php echo $formdl['filename']; ?></a>

											<?php endif; ?>


									    		<?php echo do_shortcode( $form ); ?>

									    	</div>
									    
									    </section>
									
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


<script>
jQuery(document).ready(function($){
	$('#gform_submit_button_4').addClass('puente-btn');
});

</script>