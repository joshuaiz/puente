<?php
/*
 Template Name: Donate Page
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

						<section class="honor-roll-outer">

							<section class="honor-roll-inner">

							<?php 
							$intro = get_field('intro'); ?>

							<h2>Our Supporters</h2>

							<p class="intro"><?php echo $intro; ?></p>

								<?php if( have_rows('honor_rolls') ): ?>

								<ul class="honor-rolls">
							
								<?php while( have_rows('honor_rolls') ): the_row(); 
							
									// vars
									$amount = get_sub_field('amount');
									$donors = get_sub_field('donors');
									
							
									?>
							
									<li class="amount">
							
										<h3><?php echo $amount; ?></h3>

										<?php $lines = explode("\n", $donors); // or use PHP PHP_EOL constant
										if ( !empty($lines) ) {
										  echo '<ul>';
										  foreach ( $lines as $line ) {
										    echo '<li>'. trim( $line ) .'</li>';
										  }
										  echo '</ul>';
										}
										?>
							
									</li>
							
								<?php endwhile; ?>
							
								</ul>
							
							<?php endif; ?>

							</section>


						</section>

						

				</div>

			</div>


<?php get_footer(); ?>
