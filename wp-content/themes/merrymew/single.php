<?php get_header(); ?>



<div class="content content_stories_single">
	    <section class="sec_kv">
			<?php custom_breadcrumb(); ?>
<!--             <h2><span>News</span>お知らせ</h2>
            <p>お知らせ、プレスリリースなどの情報を掲載しています。</p> -->
        </section>
		<section id="stories_single">
  		</section>
</div>

    <div class="content content_single content_stories">
        <div class="main">
            <div class="txt-box">
				<?php
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						                <div class="txt-box_top">
                    <p class="time-txt"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_wach.svg" alt=""></span><time datetime="<?php the_time( 'Y.m.d'); ?>"><?php the_time( 'Y.m.d'); ?></time></p>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                </div>
					<?php endwhile;
				endif;
				?>
				<?php
				$profile = SCF::get('profile');
				if (!empty($profile)) :
					foreach ($profile as $val) :
				?>
				                  <div class="txt-box_profile">
                    <h3>PROFILE</h3>
                    <div>
                        <p><?php echo esc_html($val['name']); ?></p>
                        <p><?php echo esc_html($val['text']); ?></p>
                    </div>
                </div>
				<?php
					endforeach;
				else :
					echo '';
				endif;
				?>
				<?php
				$sample_text_loopgroup = SCF::get('sample_text_loopgroup');
				if (!empty($sample_text_loopgroup)) :
					foreach ($sample_text_loopgroup as $val) :
				?>
				  <div class="single_txt_box">
                    <div class="single_txt_box_in">
                        <h2><?php echo esc_html($val['sample_text_val1']); ?></h2>
                        <p><?php echo esc_html($val['sample_text_val2']); ?></p>    
                    </div>
                </div>
				<?php
					endforeach;
				else :
					echo '';
				endif;
				?>

            </div>
        </div>

    </div>
<section id="recommendations" class="content_stories cmn-inner">
    <h2><span>Recommend</span>人気の記事</h2>
    <ul class="stories_list">
        <?php
        $args = array(
            'post_type' => 'stories',
            'post_status' => 'publish',
            'order' => 'ASC',
            'posts_per_page' => 20,
            'orderby' => 'date',
        );

        $wp_query = new WP_Query($args);
        ?>
        <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="stories_list_item">
                        <div class="img-box">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <div class="txt-box">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <p><?php the_time('Y.m.d');?></p>
                    </div>
                </a>
            </li>
        <?php endwhile; wp_reset_query(); endif; ?>
    </ul>
</section>


<?php get_footer(); ?>
