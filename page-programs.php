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
		$icon = get_sub_field('program_group_icon');

		?>

		<li class="program-group program-group-<?php echo $anchor; ?> cf">

			<div class="program-group-inner wrap">

			<?php if( $anchor ): ?>
				<a name="<?php echo $anchor; ?>"></a>
			<?php endif; ?>

			<?php 

				
			
				if( !empty($icon) ): ?>

				<div class="program-icon program-<?php echo $anchor; ?>-icon">
				
					<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />

				</div>
				
				<?php endif; ?>

			<h3><?php echo $title; ?> <br />
			<span class="title-spanish"><?php echo $stitle; ?></span></h3>

			<div class="program-group-description program-<?php echo $anchor; ?>-description">

				<p><?php echo $desc; ?></p>

				<!-- <p><a class="moreless" href="javascript:void(0);">+ See Schedule</a></p> -->

			</div>

			<?php if( $schedule ): ?>

			<div class="program-group-schedule program-group-<?php echo $anchor; ?>-schedule">

				<?php echo do_shortcode($schedule); ?>

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

					<p><a class="submore" href="javascript:void(0);">+ See Program Details &amp; Schedules</a></p>

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


									// display each item as a list - with a class of completed ( if completed )
									?>
									<li class="program program-<?php echo $cat; ?> program-<?php echo $cat; ?>-<?php echo $anchor; ?>">

										<h4><?php echo $title; ?></h4>

										<div class="program-description program-<?php echo $anchor; ?>-description">

											<p><?php echo $desc; ?></p>

											

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

						<p class="program-register"><a class="puente-btn" href="/programs/registration/" target="_blank">Register Now</a></p>

				</div>



		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

						</section>

					</section>

			</div>


<?php get_footer(); ?>

<script>
jQuery(document).ready(function($){
	$('.program-group-adult .submore').click(function() {
		$('.program-adult .program-description, .program-adult .program-schedule').slideToggle(500).toggleClass('expanded');
		$(this).text( $(this).text() == '+ See Program Details & Schedules' ? "- Hide Details" : "+ See Program Details & Schedules");
	});

	$('.program-group-youth .submore').click(function() {
		$('.program-youth .program-description, .program-youth .program-schedule').slideToggle(500).toggleClass('expanded');
		$(this).text( $(this).text() == '+ See Program Details & Schedules' ? "- Hide Details" : "+ See Program Details & Schedules");
	});

	$("a.program-file-link").each(function(){
    var match = this.href.match(/\.([a-zA-Z0-9]{2,4})([#;?]|$)/);
    if(match){
        $(this).nearest('.file-icon').addClass("icon-file-" + match[1]);
    }
	});
});

</script>