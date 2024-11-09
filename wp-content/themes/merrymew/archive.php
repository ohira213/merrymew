<?php get_header(); ?>



<div class="content content_news">
	    <section class="sec_kv">
			<?php custom_breadcrumb(); ?>
            <h2><span>News</span>お知らせ</h2>
            <p>お知らせ、プレスリリースなどの情報を掲載しています。</p>
        </section>
		<section id="news">
            <ul class="stories_list">
			<?php
			$args = array(
				'post_type'         => 'post',
				'post_status' => 'publish', // 公開済の投稿を指定
				'order'             => 'DESC',
				'posts_per_page'    =>  20,
				'orderby' => 'date', //新着順
				'order' => 'ASC',    // 昇順
			);

			$wp_query = new WP_Query($args);
			?>
			<?php if ( $wp_query->have_posts() ) while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		          <li>
					  <a href="<?php the_permalink(); ?>">
						  <div class="stories_list_item">
							<div class="img-box">
								<img src="<?php the_post_thumbnail_url() ?>" alt="">
							</div>
							<div class="txt-box">
								<h3><?php the_title(); ?></h3>
							</div>
							<div class="day-txt">
								<p><time datetime="<?php the_time( 'Y.m.d'); ?>"><?php the_time( 'Y.m.d'); ?></time></p>
								<div class="btn-box">
									<div class="cmn-btn01">
										詳しくみる<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_arrow04.svg" alt=""></span>
									</div>
								</div>
							</div>
                    	</div>
					</a>
                </li>
		  <?php endwhile;  wp_reset_query();// end of the loop. ?>
      </ul>
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
				// 投稿内容の表示
			endwhile;

			echo '<div class="custom-pagination">';
			the_posts_pagination(array(
				'mid_size'  => 2,
				'prev_text' => __('« 前へ'),
				'next_text' => __('次へ »'),
			));
			echo '</div>';
		else :
			echo '<p>投稿が見つかりませんでした。</p>';
		endif;
		?>
  </section>
</div>

<?php get_footer(); ?>
