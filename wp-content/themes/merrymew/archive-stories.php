<?php get_header(); ?>



<div class="content content_stories">
	    <section class="sec_kv">
			<?php custom_breadcrumb(); ?>
            <h2><span>Stories</span>卒業生の事例</h2>
            <p>メリーミューの卒業生や、メリーミューの動画学習の基となったBCC株式会社の教育プログラムを受講して転職に成功した事例を紹介します。</p>
        </section>
		<section id="stories">
            <ul class="stories_list">
			<?php
			$args = array(
				'post_type'         => 'stories', // カスタム投稿タイプを指定
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
                        <div class="btn-box pc">
                            <div class="cmn-btn01">
                                詳しくみる<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aicon_arrow03.svg" alt=""></span>
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
