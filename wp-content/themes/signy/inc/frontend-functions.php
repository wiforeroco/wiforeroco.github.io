<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'signy_sgny_excludeCat' ) ) {
  function signy_sgny_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'signy_sgny_excludeCat');
}

/* Excerpt Length */
class SignyExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: signy_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    SignyExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'SignyExcerpt::new_length');
    SignyExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(SignyExcerpt::$types[SignyExcerpt::$length]) )
      return SignyExcerpt::$types[SignyExcerpt::$length];
    else
      return SignyExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'signy_excerpt' ) ) {
  function signy_excerpt($length = 55) {
    SignyExcerpt::length($length);
  }
}

if ( ! function_exists( 'signy_new_excerpt_more' ) ) {
  function signy_new_excerpt_more( $more ) {
    return '[...]';
  }
  add_filter('excerpt_more', 'signy_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'signy_sgny_tag_cloud' ) ) {
  function signy_sgny_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'signy_sgny_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'signy_sgny_password_form' ) ) {
  function signy_sgny_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'signy_sgny_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'signy_sgny_maintenance_mode' ) ) {
  function signy_sgny_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'signy_sgny_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'signy_sgny_footer_widgets' ) ) {
  function signy_sgny_footer_widgets() {

    $output = '';
        ob_start();
        if (is_active_sidebar('footer')) {
          dynamic_sidebar( 'footer');
        }
        $output .= ob_get_clean();
    return $output;
  }
}

if( ! function_exists( 'signy_sgny_top_bar' ) ) {
  function signy_sgny_top_bar() {

    $out     = '';

    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="sgny-topbar"><div class="container"><div class="row">';
      $out .= signy_sgny_top_bar_modules( 'left' );
      $out .= signy_sgny_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }

    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'signy_wp_link_pages' ) ) {
  function signy_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'signy' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas */
if ( ! function_exists( 'signy_post_metas' ) ) {
  function signy_post_metas() {
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="bp-top-meta">
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ' ' );
        if ( $category_list ) {
          echo '<div class="bp-cat">'. $category_list .' </div>';
        }
      }
    } // Category Hides
    if ( !in_array( 'date', $metas_hide ) ) { // Date Hide
    ?>
    <div class="bp-date">
      <span><?php echo get_the_date('M d, Y'); ?></span>
    </div>
    <?php } // Date Hides
    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <div class="bp-author">
      <?php
      printf(
        '<span>'. esc_html__('by', 'signy') .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </div>
    <?php } ?>
  </div>
  <?php
  }
}

/* Share Options */
if ( ! function_exists( 'signy_wp_share_option' ) ) {
  function signy_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'signy' );
    ?>
    <ul class="list-inline">
      <li>
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Facebook', 'signy'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
      </li>
      <li>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Twitter', 'signy'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      </li>
      <li>
        <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-pinterest" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Pinterest', 'signy'); ?>" target="_blank">
        <i class="fa fa-pinterest"></i>
        </a>
      </li>
      <li>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" title="<?php echo esc_attr( $share_on_text .' '); echo esc_html__('Linkedin', 'signy'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
      </li>
    </ul>
<?php
  }
}

/* Author Info */
if ( ! function_exists( 'signy_author_info' ) ) {
  function signy_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="sgny-fix sgny-author-bio">
      <!--post author avatar start\-->
      <div class="sgny-author-avatar">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 130 ); ?>
      </div>
      <!--post author desc start\-->
      <div class="sgny-fix sgny-author-desc-warp">
        <h4><?php esc_html_e('Hi, I\'m', 'signy'); ?> <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a></h4>
        <p><?php echo get_the_author_meta( 'description' ); ?></p>
        <!--post author socail start\-->
        <?php
        $facebook = get_the_author_meta('facebook');
        $twitter  = get_the_author_meta('twitter');
        $vine = get_the_author_meta('vine');
        $pinterest = get_the_author_meta('pinterest');
        $instagram = get_the_author_meta('instagram');
        ?>
        <ul class="list-inline  sgny-author-socail">
          <?php
          if(!empty($facebook)) {
          echo '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
          }
           if(!empty($twitter)) {
          echo '<li><a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
          }
          if(!empty($vine)) {
          echo '<li><a href="'.$vine.'" target="_blank"><i class="fa fa-vine"></i></a></li>';
          }
          if(!empty($pinterest)) {
          echo '<li><a href="'.$pinterest.'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
          }
          if(!empty($instagram)) {
          echo '<li><a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
          }
         ?>
        </ul>
        <?php
        $author_url = get_the_author_meta('url');
        echo '<a href="'. $author_url .'" target="_blank" class="sgny-author-url">'. $author_url .'</a>';
        ?>
      </div>
  </div>

<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'signy_comment_modification' ) ) {
  function signy_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 80 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
    <div class="comment-wrapper">
      <div class="sgny-comments-meta">
        <h4><?php printf( '%s', get_comment_author() ); ?></h4>
        <span class="comments-date">
          <?php
          echo get_comment_date('F j, Y'); echo ' at ';
          echo get_comment_time();
          ?>
        </span>
      </div>
      <div class="comment-content">
        <?php comment_text(); ?>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'signy' ); ?></em>
      <?php endif; ?>
      <div class="comments-reply">
        <?php
          comment_reply_link( array_merge( $args, array(
          'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply', 'signy') .'</span>',
          'before' => '',
          'class'  => '',
          'depth' => $depth,
          'max_depth' => $args['max_depth']
          ) ) );
        ?>
      </div>
    </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;?>
  <?php
  }
}

/* Title Area */
if ( ! function_exists( 'signy_title_area' ) ) {
  function signy_title_area() {

    global $post, $wp_query;

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'signy' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'signy'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'signy' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'signy' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'signy' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'signy' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_woocommerce_shop() ) {
        echo esc_attr($custom_title);
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'signy' );
      }
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'signy_paging_nav' ) ) {
  function signy_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( 'OLDER POSTS', 'signy' );
      $newer_post = $newer_post ? $newer_post : esc_html__( 'NEWER POSTS', 'signy' );
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        $pages = paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'prev_text' => '<i class="fa fa-long-arrow-left"></i>PREV',
          'next_text' => 'NEXT<i class="fa fa-long-arrow-right"></i>',
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages,
          'type'  => 'array',
        ) );
        if( is_array( $pages ) ) {
          $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
          echo '<div class="text-center sgny-posts-pagination-warp"><nav class="navigation pagination"><div class="nav-links">';
          foreach ( $pages as $page ) {
            echo "$page";
          }
         echo '</div></nav></div>';
        }

      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}
