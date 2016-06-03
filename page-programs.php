<?php
/*
 Template Name: Programs Page
 *
 * 
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

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

				<section class="program-outer">

							<section class="program-inner cf">

							<?php if( have_rows('program_group') ): ?>

	<ul class="program-groups">

	<?php while( have_rows('program_group') ): the_row(); 

		// vars
		$anchor = get_sub_field('program_group_anchor');
		$title = get_sub_field('program_group_title');
		$stitle = get_sub_field('program_spanish_title');
		$desc = get_sub_field('program_general_description');
		$schedule = get_sub_field('program_group_schedule');
		$spanish = get_sub_field('program_group_spanish_schedule');
		$icon = get_sub_field('program_group_icon');
		$image = get_sub_field('cover_photo');

		?>

		<li class="program-group program-group-<?php echo $anchor; ?> cf">

			<div class="program-group-inner wrap">

			<?php if( $anchor ): ?>
				<a name="<?php echo $anchor; ?>"></a>
			<?php endif; ?>

			<?php if( !empty($image) ): 

	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	if( $caption ): ?>

		<div class="wp-caption">

	<?php endif; ?>

	<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">

		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

	</a>

	<?php if( $caption ): ?>

			<p class="wp-caption-text"><?php echo $caption; ?></p>

		</div>

	<?php endif; ?>

<?php endif; ?>

			<h3><?php echo $title; ?> <br />

			<span class="title-spanish"><?php echo $stitle; ?></span></h3>

			<div class="program-group-description program-<?php echo $anchor; ?>-description">

				<p><?php echo $desc; ?></p>

				<!-- <p><a class="moreless" href="javascript:void(0);">+ See Schedule</a></p> -->

			</div>

			<?php if( $schedule ): ?>

			<div class="program-group-schedule program-group-<?php echo $anchor; ?>-schedule">


				<h5>English Schedule</h5>
				<?php echo do_shortcode($schedule); ?>
				
				<h5>Horario español</h5>
				<?php echo do_shortcode($spanish); ?>

			</div>

			<div class="program-group-files program-group-<?php echo $anchor; ?>-files">

			<?php if( have_rows('program_group_documents') ): ?>

				<h3><?php echo $title; ?> Documents</h3>
				
					<ul class="program-files cf">
				
						
				
					<?php while( have_rows('program_group_documents') ): the_row(); 
				
						// vars
						$file = get_sub_field('file');
						
						?>
				
						<li class="program-file">
				
							<?php if( $file ): ?>
				
								<span class="file-icon"></span>
					
					<a class="program-file-link" href="<?php echo $file['url']; ?>"><?php echo $file['title']; ?></a>
				
				<?php endif; ?>
				
						</li>
				
					<?php endwhile; ?>
				
					</ul>
				
				<?php endif; ?>


			</div>

			<?php endif; ?>

				<?php if( have_rows('programs') ): ?>

					<p><a class="submore" href="javascript:void(0);">+ See Program Details</a></p>

					<div class="sub-programs">

								<ul class="programs programs-<?php echo $anchor; ?>">
								<?php 

								// loop through rows (sub repeater)
								while( have_rows('programs') ): the_row();

									$anchor = get_sub_field('program_anchor');
									$title = get_sub_field('program_title');
									$desc = get_sub_field('program_description');
									$schedule = get_sub_field('program_schedule');
									$cat = get_sub_field('program_category');
									$image = get_sub_field('contact_image');
									$contact = get_sub_field('program_contact');
									$photo = get_sub_field('photo');
									


									// display each item as a list - with a class of completed ( if completed )
									?>
									<li class="program program-<?php echo $cat; ?> program-<?php echo $cat; ?>-<?php echo $anchor; ?>">

										<h4><?php echo $title; ?></h4>

										

										<div class="program-description program-<?php echo $anchor; ?>-description">

											
											<?php if( !empty($photo) ): ?>

											<?php $caption = $photo['caption']; ?>


											

												<div class="program-photo">

												<?php if( $caption ): ?>

											<div class="photo-caption">

											<?php endif; ?>
							
													<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />

													<?php if( $caption ): ?>

												<p class="wp-caption-text"><?php echo $caption; ?></p>

												</div>

												<?php endif; ?>

												</div>

												
											
											<?php endif; ?>

										

											<p><?php echo $desc; ?></p>

											<?php 



										if( !empty($image) ): ?>

										<div class="program-contact">

											<div class="program-contact-image">
										
											<?php // vars
											$url = $image['url'];
											$title = $image['title'];
											$alt = $image['alt'];
											$caption = $image['caption'];
										
											// thumbnail
											$size = 'thumbnail';
											$thumb = $image['sizes'][ $size ];
											$width = $image['sizes'][ $size . '-width' ];
											$height = $image['sizes'][ $size . '-height' ];
										
											?>
										
											<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
										
												<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
										
											</a>

											</div>

											<p><?php echo $contact; ?></p>


										</div>
										
										
										<?php endif; ?>

											

										</div>

										<?php if( $schedule ): ?>

											<div class="program-schedule program-<?php echo $anchor; ?>-schedule">

												<?php echo do_shortcode($schedule); ?>

											</div>

										<?php endif; ?>



										
									</li>

								<?php endwhile; ?>

								</ul>

						</div>

						<?php endif; ?>

						<div class="program-register">
							
							<?php echo $reg; ?>

						</div>

				</div>



		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

		<div class="schedule-button">

			<a class="puente-btn" href="/schedule/">See Full Schedule &rarr;</a>

		</div>

						</section>



					</section>

			</div>


<?php get_footer(); ?>

<script>
jQuery(document).ready(function($){
	$('.program-group-preschool .submore').click(function() {
		$('.program-preschool .program-description, .program-preschool .program-schedule').slideToggle(500);
		$(this).nearest('li.program').toggleClass('expanded');
		$(this).text( $(this).text() == '+ See Program Details' ? "- Hide Details" : "+ See Program Details");
	});

	$('.program-group-adult .submore').click(function() {
		$('.program-adult .program-description, .program-adult .program-schedule').slideToggle(500);
		$(this).nearest('li.program').toggleClass('expanded');
		$(this).text( $(this).text() == '+ See Program Details' ? "- Hide Details" : "+ See Program Details");
	});

	$('.program-group-youth .submore').click(function() {
		$('.program-youth .program-description, .program-youth .program-schedule').slideToggle(500);
		$(this).nearest('li.program').toggleClass('expanded');
		$(this).text( $(this).text() == '+ See Program Details' ? "- Hide Details" : "+ See Program Details");
	});

	$('.program-group-highschool .submore').click(function() {
		$('.program-highschool .program-description, .program-highschool .program-schedule').slideToggle(500);
		$(this).nearest('li.program').toggleClass('expanded');
		$(this).text( $(this).text() == '+ See Program Details' ? "- Hide Details" : "+ See Program Details");
	});

	$("a.program-file-link").each(function(){
    var match = this.href.match(/\.([a-zA-Z0-9]{2,4})([#;?]|$)/);
    if(match){
        $(this).nearest('.file-icon').addClass("icon-file-" + match[1]);
    }
	});
});

</script>