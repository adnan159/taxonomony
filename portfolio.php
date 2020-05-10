<?php
/**
 * Template Name: Portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

				$showvar = new WP_Query(array(
					'post_type'	=>'post_type_id',
					'post_per_page'	=>10
				));
			?>

			<?php while ( $showvar -> have_posts() ) : $showvar -> the_post(); ?> 
					
				<?php the_title(); ?>
				<?php the_post_thumbnail(); ?>

				<p>
					<?php
						echo wp_trim_words( get_the_content(), 10, '<a href="'.get_permalink().'"> Read More</a>' );
					?>			
				</p>


				<p>
					Topics: <?php

						$topic = get_the_terms(get_the_ID(),'topic_id');

						foreach ($topic as $topics) {
						  	$portfolio_var = $topics->name;
							$link = get_term_link($topics,'topic_id');

							echo '<a href="'.$link.'">'.$portfolio_var .'</a> ';
						}
					?>
				</p>

				<p>
					Tag:<?php

						$tag = get_the_terms(get_the_ID(),'tag_id');

						foreach ($tag as $tags) {
							$keyurl = get_term_link($tags,'tag_id');
							$tag_var = $tags->name;

							echo '<a href="'.$keyurl.'">'.$tag_var.'</a> ';
						}

					?>

				</p>

					


			<?php endwhile; // End the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();
