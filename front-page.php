<?php
get_header(); ?>
	<!-- site-content -->
	<div class="site-content clearfix">
			<?php
        if (have_posts()) :
  				while (have_posts()) : the_post();
  				    the_content();
  				endwhile;
				else :
					echo '<p>No content found</p>';
				endif; ?>
        <!-- home-columns -->
        <div class="home-columns clearfix">
          <div class="one-half">
            <?php
              // Hositng Posts
              $hostingPosts = new WP_Query('cat=6&posts_per_age=3&orderby=title&order=ASC');
              if ($hostingPosts->have_posts()) :
                while ($hostingPosts->have_posts()) : $hostingPosts->the_post(); ?>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php the_excerpt(); ?></p>
                <?php endwhile;
              else:
              endif;
              wp_reset_postdata();
            ?>
          </div>
          <div class="one-half last">
            <?php
              // News Posts
              $newsPosts = new WP_Query('cat=7&posts_per_age=3&orderby=title&order=ASC');
              if ($newsPosts->have_posts()) :
                while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php the_excerpt(); ?></p>
                <?php endwhile;
              else:
              endif;
              wp_reset_postdata();
            ?>
          </div>
        </div>
	<?php get_footer();
?>
