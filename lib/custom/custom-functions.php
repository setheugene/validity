<?php
/**
 *
 * Lifted Logic custom functions
 *
 */

/**
 * Formats text like the default WordPress wysiwyg
 * Example use case, get_the_content() to display p tags and format shortcodes
 */
function format_text( $content ) {
  $content = apply_filters('the_content', $content);
  return $content;
}

/**
* Converts phone numbers to the formatting standard
*
* @param   String   $num   A unformatted phone number
* @return  String   Returns the formatted phone number
*/
function format_phone( $num,$area = false,$sep='-' ) {

  $num = preg_replace( '/[^0-9]/', '', $num );
  $len = strlen( $num );

  if( $len == 7 ) {

    $num = preg_replace( '/([0-9]{3})([0-9]{4})/', '$1'.$sep.'$2', $num );
  }
  elseif( $len == 10 ) {

    if ( $area )
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/','($1) $2'.$sep.'$3', $num );
    else
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/','$1'.$sep.'$2'.$sep.'$3', $num );
  }
  elseif( $len > 10 ) {

    if ( $area )
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})([0-9])/','($1) $2'.$sep.'$3'.' ext. $4', $num );
    else
      $num = preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})([0-9])/','$1'.$sep.'$2'.$sep.'$3'.' ext. $4', $num );
  }

  return $num;
}

/**
* Strips all non-numeric characters from a string
*
* @param   String   $num   A unformatted phone number
* @return  String   Returns number without any special characters or spaces
*/
function strip_phone($num) {
  $num = preg_replace('/[^0-9]/','',$num);
  if ( strlen( $num ) > 10 ) {
    $num = substr_replace( $num, ',', 10, 0 );
  }
  return $num;
}

/**
 * Get all social media sites from site options and outputs them with their associated icons into a unordered list
 * @param array $args
 * @param string $args['icon_classes']
 * @param string $args['link_classes']
 * @param string $args['list_item_classes']
 * @param string $args['list_classes']
 * @return string html markup of social media sites and links
 */
function ll_get_social_list($args=array()) {
  $social_media_sites = array(
    'youtube' => get_field( 'social_youtube', 'option' ),
    'linkedin' => get_field( 'social_linkedin', 'option' ),
    'twitter' => get_field( 'social_twitter', 'option' ),
    'facebook' => get_field( 'social_facebook', 'option' ),
    'instagram' => get_field( 'social_instagram', 'option' ),
    'pinterest' => get_field( 'social_pinterest', 'option' ),
    'tiktok' => get_field( 'social_tiktok', 'option' ),
  );

  $social_media_sites = ll_filter_array( $social_media_sites );

  if( !isset($args['icon_classes']) ) {
    $icon_classes = 'social-list__icon h-3 w-3';
  } else {
    $icon_classes = $args['icon_classes'];
  }

  if ( !isset($args['link_classes']) ) {
    $link_classes = 'inline-flex items-center justify-center relative bg-brand-deep-green hover:bg-brand-light-green-2 text-white rounded-full h-6 w-6 social-list__link';
  } else {
    $link_classes = $args['link_classes'];
  }

  if( !isset($args['list_item_classes'] )) {
    $list_item_classes = 'social-list__item inline-block leading-none';
  } else {
    $list_item_classes = $args['list_item_classes'];
  }

  if( !isset($args['list_classes']) ) {
    $list_classes = 'social-list grid grid-flow-col justify-start gap-3';
  } else {
    $list_classes = $args['list_classes'];
  }

  if ( $social_media_sites ) {
    echo '<ul class="'.$list_classes.'">';
      foreach ( $social_media_sites as $social => $link ) {
        echo '<li class="'.$list_item_classes.'">';
        echo '<a class="'.$link_classes.' '.$social.'" href="'.$link.'" target="_blank">';
        echo '<span class="sr-only">'.implode( " ", explode( '_', $social ) ).'</span>';echo '<svg class="'.$icon_classes.' icon icon-'.$social.'"><use xlink:href="#icon-'.$social.'"></use></svg>';
        echo '</a></li>';
      }
    echo '</ul>';
  }
}

/* ll_get_address used with ll_address_shortcode, remove or update to make more functional for dev use as well */
function ll_get_address() {
  $address = array(
    'streetAddress'   => get_field('contact_street_address', 'option'),
    'addressLocality' => get_field('contact_city', 'option'),
    'addressRegion'   => get_field('contact_state', 'option'),
    'postalCode'      => get_field('contact_zip', 'option'),
  );
  return $address;
}

function blog_pre_get_posts( $query ) {
  if ( ! is_admin() && $query->is_main_query() && is_home() ) {
    $featured_post = get_field( 'blog_featured_post', get_option('page_for_posts') );
    if ( $featured_post ) {
      $query->set( 'post__not_in', [ $featured_post ] );
    }
  }
}
add_action( 'pre_get_posts', 'blog_pre_get_posts' );

/**
 * Add wrapper to oEmbed content and add in lazy
 */
add_filter( 'oembed_dataparse', 'll_wrap_oembed_dataparse', 99, 4 );
function ll_wrap_oembed_dataparse( $return, $data, $url ) {

  // Add custom data-src to lazy load the embeds
  if($data->type == 'video') {
    $return = preg_replace('/(src="([^\"\']+)")/', 'src="" data-src-defer="$2" loading="lazy"', $return);
  }

  return '<div class="embed-responsive">' . $return . '</div>';
}

add_filter( 'wpseo_metabox_prio', 'll_move_yoast_to_bottom');
function ll_move_yoast_to_bottom() {
  return 'low';
}

add_filter('use_block_editor_for_post_type', '__return_false', 10);

/* Utilizes Yoast breadcrumbs for blog pages & makes them ADA compliant */
function modify_yoast_breadcrumb_single_link( $link_output, $link ) {
  global $post;
  // Replace the <span> tag with an <li> tag
  $separator = apply_filters( 'wpseo_breadcrumb_separator', '' );
  $link_output = str_replace( '<span', '<li class="yoast-breadcrumb__link"' , $link_output );
  $link_output = str_replace( '</span>', '</li>', $link_output );


  // remove the current page aka last breadcrumb
  if(is_single () && ('post' == get_post_type() ) && strpos( $link_output, 'breadcrumb_last' ) !== false ) {
    $link_output = '';
  }

  // Return the modified link
  return $link_output;
}
add_filter( 'wpseo_breadcrumb_single_link', 'modify_yoast_breadcrumb_single_link', 10, 2 );

function modify_yoast_breadcrumb_wrapper( $output, $context ) {
  // Replace the <span> wrapper with an <ol> wrapper
  $output = str_replace( '<span', '<nav aria-label="breadcrumb" class="mb-10 yoast-breadcrumb"><ol class="flex flex-wrap list-none"', $output );
  $output = str_replace( '</span>', '</ol></nav>', $output );

  return $output;
}
add_filter( 'wpseo_breadcrumb_output', 'modify_yoast_breadcrumb_wrapper', 10, 2 );

function modify_breadcrumb_separator($separator) {
  // Update the separator to be more ada friendly
  $separator = '<li class="mx-2 yosat-breadcrumb__separator" aria-hidden="true">' . $separator . '</li>';
  return $separator;
}
add_filter('wpseo_breadcrumb_separator', 'modify_breadcrumb_separator');

function add_white_arrow_to_button( $html ) {
  return preg_replace('/<a ([^><]*) (data-white-arrow="true")>([^><]*)<\/a>/', '<a $1 $2><span class="circle"><svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"/><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"/></g></svg></span><span class="btn-title">$3</span></a>', $html);
}
add_filter( 'acf_the_content', 'add_white_arrow_to_button', 10, 1 );
add_filter( 'the_content', 'add_white_arrow_to_button', 10, 1 );

function add_black_arrow_to_button( $html ) {
  return preg_replace('/<a ([^><]*) (data-black-arrow="true")>([^><]*)<\/a>/', '<a $1 $2><span class="circle"><svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="#363B40"/><path class="line" d="M12 8.10022L2 8.10022" stroke="#363B40" stroke-linecap="round"/></g></svg></span><span class="btn-title">$3</span></a>', $html);
}
add_filter( 'acf_the_content', 'add_black_arrow_to_button', 10, 1 );
add_filter( 'the_content', 'add_black_arrow_to_button', 10, 1 );
