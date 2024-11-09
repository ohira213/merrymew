<?php
/*--------------------------------------------------
  投稿アーカイブページの作成
--------------------------------------------------*/
function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'news'; //任意のスラッグ名
	}
	return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


/*--------------------------------------------------
  ヘッダー
--------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) )
	// RSSフィードへのリンクを追加
	add_theme_support( 'automatic-feed-links' );
	// titleタグを出力
	add_theme_support( 'title-tag' );

// サイトトップページのドキュメントタイトルからdescriptionを取り除く
add_filter( 'pre_get_document_title', function ( $title ) {
	if(is_front_page()){
		$title = get_bloginfo();
	}
	return $title;
}, 10, 2 );

// WordPress同梱のjQueryにテーマフォルダ内のcommon.jsをリンクする
function my_scripts_method() {
	wp_enqueue_script(
		'custom-script',
		get_stylesheet_directory_uri() . '/js/common.js',
		array( 'jquery' )
	);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


/*--------------------------------------------------
  ナビゲーション
--------------------------------------------------*/

// カスタムメニューエリアの設定
register_nav_menus( array(
	'sp_main_nav'	 => esc_html('スマホナビゲーション'),
) );
// アイキャッチ設定追加
add_theme_support('post-thumbnails');

// アイキャッチデフォルト画像
function default_thumbnail( $post_id ) {
    $post_thumbnail = get_post_meta( $post_id, $key = '_thumbnail_id', $single = true );
    $default_thumbnail_id = '33';//　画像のポストIDを指定
    if ( !wp_is_post_revision( $post_id ) ) {
        if ( empty( $post_thumbnail ) ) {
            update_post_meta( $post_id, $meta_key = '_thumbnail_id', $meta_value = $default_thumbnail_id );
        }
    }
}

add_action( 'save_post', 'default_thumbnail' );

// 切り抜き　トップサムネイル
add_image_size( 'top_thumbnail', 456, 340, true );

// 切り抜き　アーカイブサムネイル
add_image_size( 'archive_thumbnail', 200, 145, true );

// firefoxで上部の余白（Wordpress使用）を消す
add_filter( 'show_admin_bar', '__return_false' );

// スラッグを用いたclassを付与する
add_filter( 'body_class', 'add_page_slug_class_name' );
function add_page_slug_class_name( $classes ) {
  if ( is_page() ) {
    $page = get_post( get_the_ID() );
    $classes[] = $page->post_name;
  }
  return $classes;
}

// アイキャッチ画像をフルサイズで取得
add_filter( 'image_send_to_editor', 'remove_image_attribute', 10 );
add_filter( 'post_thumbnail_html', 'remove_image_attribute', 10 );
function remove_image_attribute( $html ){
$html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
$html = preg_replace( '/class=[\'"]([^\'"]+)[\'"]/i', '', $html );
return $html;
}

// ショートコード
function shortcode_url() {
    return get_bloginfo('url');
}
add_shortcode('url', 'shortcode_url');
function shortcode_templateurl() {
    return get_bloginfo('template_url');
}
add_shortcode('template_url', 'shortcode_templateurl');

/*【出力カスタマイズ】クエリーカスタマイズ、ループから非公開記事を除外 */
function custom_posts() {
  global $wp_query;
  if($wp_query->is_admin) return; // 管理画面内は除く
  if(is_post_type_archive()){ // アーカイブページ
    $wp_query->query_vars['post_status'] = 'publish'; // 投稿ステータス「公開済」
  }
}
add_filter('pre_get_posts', 'custom_posts');

function custom_breadcrumb() {
    $separator = ' > ';
    $home_title = '<img src="http://kir727063.kir.jp/mmtest/wp-content/themes/merrymew/assets/img/aicon_home.svg" alt="">';

    if (!is_front_page()) {
        echo '<div class="breadcrumb">';
        echo '<a href="' . home_url() . '">' . $home_title . '</a>' . $separator;

        if (is_category() || is_single()) {
            the_category(', ');
            if (is_single()) {
                echo $separator;
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        } elseif (is_archive()) {
            // カテゴリ、タグ、投稿タイプに応じて表示
            if (is_category() || is_tag()) {
                echo single_cat_title('', false);
            } elseif (is_post_type_archive()) {
                echo post_type_archive_title('', false);
            } elseif (is_author()) {
                echo get_the_author();
            } elseif (is_date()) {
                echo get_the_date();
            }
        } elseif (is_search()) {
            echo '検索結果: ' . get_search_query();
        }
        echo '</div>';
    }
}
