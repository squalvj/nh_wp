<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

// svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function checkAnnouncment(){
	$field = get_fields(4);
	$html = '';
	if ($field['announcment']){
		$html = "<div class='modal'>
          <div class='wrapper-modal'>
            <h1>".$field['announcment_header']."</h1>
            <p>".$field['announcment_content']."</p>
            <button class='btn-close-modal'>CLOSE X</button>
          </div>
        </div>";
	}
	return $html;
}

function trimSpace($str){
	$st = str_replace(' ', '', $str);
	return $st;
}

function trimSpecial($str){
	$vars = preg_replace("/[^A-Za-z0-9]/", "", $str);
	return $vars;
}
function getMonths($args = '') {
    global $wpdb, $wp_locale;
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    var_dump($actual_link);
    $defaults = array(
        'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if ( '' != $limit ) {
        $limit = absint($limit);
        $limit = ' LIMIT '.$limit;
    }

    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;

    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';

    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';

    if ( !$archive_date_format_over_ride ) {
        $archive_day_date_format = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format = get_option('date_format');
    }

    //filters
    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters('customarchives_join', "", $r);
    $output = '<ul>';
        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        $key = md5($query);
        $cache = wp_cache_get( 'wp_custom_archive' , 'general');
        if ( !isset( $cache[ $key ] ) ) {
            $arcresults = $wpdb->get_results($query);
            $cache[ $key ] = $arcresults;
            wp_cache_set( 'wp_custom_archive', $cache, 'general' );
        } else {
            $arcresults = $cache[ $key ];
        }
        if ( $arcresults ) {
            $afterafter = $after;
            foreach ( (array) $arcresults as $arcresult ) {
                $url = get_month_link( $arcresult->year, $arcresult->month );
                $year_url = get_year_link($arcresult->year);
                /* translators: 1: month name, 2: 4-digit year */
                $format = 
                $text = sprintf(__('%s'), $wp_locale->get_month($arcresult->month));
                $year_text = sprintf('%d', $arcresult->year);
                if ( $show_post_count )
                    $after = '&nbsp;('.$arcresult->posts.')' . $afterafter;

                $year_output = get_archives_link($year_url, $year_text, $format, $before, $after);
                var_dump($year_url);
                $output .= ( $arcresult->year != $temp_year ) ? $year_output : '';

                $output .= get_archives_link($url, $text, $format, $before, $after);

                $temp_year = $arcresult->year;
            }
        }

    $output .= '</ul>';

    if ( $echo )
        echo $output;
    else
        return $output;
}

function last_post_year(){
  $args2 = array(
      'numberposts' => 1,
      'order' => 'DESC',
      'post_status' => 'publish',
      'post_type' => 'post'
  );

  $recent_posts = wp_get_recent_posts($args2); 

  $post = $recent_posts[0];
  return date("Y", strtotime($post['post_date']));
}

function first_post_year(){
  $args2 = array(
      'numberposts' => 1,
      'order' => 'ASC',
      'post_status' => 'publish',
      'post_type' => 'post'
  );

  $recent_posts = wp_get_recent_posts($args2); 

  $post = $recent_posts[0];
  return date("Y", strtotime($post['post_date']));
}

function getmonth(){
    global $wpdb, $wp_locale;
    $yearliest_year = $wpdb->get_results(
        "SELECT YEAR(post_date) AS year 
         FROM $wpdb->posts 
         WHERE post_status = 'publish' 
         AND post_type = 'post'
         ORDER BY post_date 
         DESC LIMIT 1
    ");
    if($yearliest_year){
        $this_year = first_post_year();
        $months = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
        $current_year = $yearliest_year[0]->year;
        while($current_year >= $this_year){
            echo "<ul>";
            echo "<a class='year'>" . $current_year . "</a>";
            $ujung = 12;
            foreach(array_reverse($months) as $month_num => $month){
                //Checks to see if a month a has posts
                if($search_month = $wpdb->query(
                        "SELECT MONTHNAME(post_date) as month 
                            FROM $wpdb->posts  
                            WHERE MONTHNAME(post_date) = '$month'
                            AND YEAR(post_date) = $current_year 
                            AND post_type = 'post'
                            AND post_status = 'publish'
                            order by post_date desc
                            LIMIT 1 
                ")){
                    if ( have_posts() ) : 
                        echo "<ul class='child'>";
                        while( have_posts() ) : the_post();
                            $title = get_post_permalink();
                            echo "<li><a href='".$title."'>"."</a></li>";
                        endwhile;
                        echo "</ul>";
                    endif;
                    //Month has post -> link it
                    $link = get_bloginfo('url') . "/" . $current_year . "/" . $ujung;
                    echo "<li><a href='".$link."'><span class='archive-month'>" . $month . "</span></a></li>";
                }else{

                    //Month does not have post -> just print it

                    // echo "<li>
                    //         <span class='archive-month'>" . $month . "</span>

                    //       </li>";
                }
                $ujung--;
            }

            echo "</ul>";

            $current_year--;
        }

    }else{
        echo "No Posts Found.";

    }
}

function show12(){
    global $wpdb;
    // get years that have posts
    $years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year DESC" );

foreach ( $years as $year ) {
    // get posts for each year
    $posts_this_year = $wpdb->get_results( "SELECT post_title FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = '" . $year->year . "'" );

    echo '<h2>' . $year->year . '</h2><ul>';
    foreach ( $posts_this_year as $post ) {
        echo '<li>' . $post->post_title . '</li>';
    }
    echo '</ul>';
}
}