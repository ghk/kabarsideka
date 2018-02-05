<?php get_header(); ?>

    <!-- News -->
    <section id="news">
        <div class="container post-container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post" class="post col-md-12 col-xs-12">
                <div class="post-image col-sm-2 col-xs-12">
                    <?php
                    $thumbnail = get_post_meta($post->ID, 'thumbnail_html', true) ;
						if($thumbnail != "") {
                        ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php
							echo str_replace('150', '500', $thumbnail);
                        ?>
					        </a>
						<?php } ?>
                </div>
                <div class="post-content col-sm-10 col-xs-12">
                    <a id="post-title" class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="post-info">
                        <a href="#" id="date"><i class="fa fa-calendar"></i> <?php the_date(); ?></a>&emsp;
						<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>" id="author"><i class="fa fa-user"></i> <?php the_author(); ?></a>&emsp;
						<a href="<?php the_permalink(); ?>" id="comments"><i class="fa fa-commenting"></i> <?php echo get_comments_number(); ?> komentar</a>
                    </div>

                    <p id="post-preview"><?php the_excerpt(); ?></p>
					<?php
						$blog_id = get_post_meta($post->ID, 'blogid', true) ;
						global $wpdb;
						$desa = $wpdb->get_var('select desa from sd_desa where blog_id = '.$blog_id);
						$kabupaten = $wpdb->get_var('select kabupaten from sd_desa where blog_id = '.$blog_id);
						$domain = $wpdb->get_var('select domain from sd_desa where blog_id = '.$blog_id);
						
						$desa_name = $domain;
						if($desa && $desa != ''){
							$desa_name = $desa . ' - ' .$kabupaten;
						}
					?>
                    <a href="http://<?php echo $domain; ?>" id="desa"><?php echo $desa_name; ?></a>&emsp; 
					<?php $categories = get_the_category(); 
					foreach ($categories as $category) {
						echo '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>&emsp;'; 
					}?> 
                </div>
            </div>

			<?php endwhile; endif; ?>
        </div>
		
		<div class="container">
			<div class="col-md-12 col-xs-12">
				<div class="page-load-status">
					<div class="infinite-scroll-request">
						<div class="loader-ellips">
						  <span class="loader-ellips__dot"></span>
						  <span class="loader-ellips__dot"></span>
						  <span class="loader-ellips__dot"></span>
						  <span class="loader-ellips__dot"></span>
						</div>
					</div>
			  </div>
			</div>
		</div>

		<script type='text/javascript'>
			var href = window.location.href
			if(href.endsWith('/')){
				href = href.substring(0, href.length - 1);
			}
			$('#news .post-container').infiniteScroll({
			  // options
			  path: href+'/page/{{#}}/',
			  append: '#post',
			  history: false,
			  status: '.page-load-status'
			});
		</script>
    </section>

<?php get_footer(); ?>
