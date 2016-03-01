<?php
/*
 Template Name: Board Page
 *
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php $postid = get_the_ID(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

								<?php $spanish = get_field('spanish_title', $postid); ?>

									<h1 class="page-title"><?php the_title(); ?> <span class="separator">|</span> <?php echo $spanish; ?></h1>

									

									


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

						<div class="bios-outer">

							<?php if( have_rows('bios') ): ?>

	<ul class="bios">

	<?php while( have_rows('bios') ): the_row(); 

		// vars
		$name = get_sub_field('name');
		$title = get_sub_field('title');
		$photo = get_sub_field('photo');
		$email = get_sub_field('email');
		$phone = get_sub_field('phone');
		$bio = get_sub_field('bio');

		

		?>

		<li class="bio">

			<div class="bio-photo">

				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />

			</div>

			<div class="bio-wrap">

				<div class="bio-meta">
				
					<h3><?php echo $name; ?><br><span class="bio-title"><?php echo $title; ?></span></h3>

					<h4><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> | <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></h4>



				</div>

				<div class="bio-content">

					<?php echo $bio; ?>

				</div>
		    	

		    </div>

		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>


						</div>

						

				</div>

			</div>


<?php get_footer(); ?>
