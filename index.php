<?php get_header(); ?>

    <!-- News -->
    <section id="news">
        <div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post" class="post col-md-12 col-xs-12">
                <div class="post-image col-md-2 col-xs-3">
                    <a href="<?php the_permalink(); ?>">
						<?php
						$thumbnail = get_post_meta($post->ID, 'thumbnail_html', true) ;
						if($thumbnail != "") {
							echo $thumbnail;
						} else {
							echo '<img class="attachment-thumbnail size-thumbnail" src="' . get_template_directory_uri() . '/images/placeholder-square.png' . '" width="150" height="150" sizes="(max-width: 150px) 100vw, 150px">';
						}
						?>
					</a>
                </div>
                <div class="post-content col-md-10 col-xs-9">
                    <a id="post-title" class="post-title" href="#"><?php the_title(); ?></a>
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
			
            <div id="paging" class="paging">
                <nav class="my-4">
                    <ul class="pagination pagination-circle pg-blue mb-0">

                        <!--First-->
                        <li class="page-item disabled"><a class="page-link">First</a></li>

                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <!--Numbers-->
                        <li class="page-item active"><a href="/page/1" class="page-link">1</a></li>
                        <li class="page-item"><a href="/page/2" class="page-link">2</a></li>
                        <li class="page-item"><a href="/page/3" class="page-link">3</a></li>
                        <li class="page-item"><a href="/page/4" class="page-link">4</a></li>
                        <li class="page-item"><a href="/page/5" class="page-link">5</a></li>

                        <!--Arrow right-->
                        <li class="page-item">
                            <a class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                        <!--First-->
                        <li class="page-item"><a class="page-link">Last</a></li>

                    </ul>
                </nav>

            </div>




        </div>
    </section>

<?php get_footer(); ?>
