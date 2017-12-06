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

function last_post_month(){
  $args2 = array(
      'numberposts' => 1,
      'order' => 'DESC',
      'post_status' => 'publish',
      'post_type' => 'post'
  );

  $recent_posts = wp_get_recent_posts($args2); 

  $post = $recent_posts[0];
  return date("m", strtotime($post['post_date']));
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

function getNavbarArchive(){
    global $wpdb, $wp_locale;
    $getyear;
    $post = array();
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $yearliest_year = $wpdb->get_results(
        "SELECT YEAR(post_date) AS year 
         FROM $wpdb->posts 
         WHERE post_status = 'publish' 
         AND post_type = 'post'
         ORDER BY post_date 
         DESC LIMIT 1
    ");
     if ( have_posts() ) : 
        $i = 0;
        while( have_posts() ) : the_post();
            $id = get_the_ID();
            $link = get_permalink($id) ;
            $title = get_the_title();
            $getyear = get_the_date('Y');
            $post[] = array("link" => $link, "title" => $title); 
            $i++;
        endwhile;
    endif;

    if($yearliest_year){
        $this_year = first_post_year();
        $months = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
        $current_year = $yearliest_year[0]->year;

        while($current_year >= $this_year){
            $link_year = get_bloginfo('url') . "/" . $current_year . "/";
            echo "<ul>";

            if ($getyear == $current_year){
                echo "<a href='' class='year active'>" . $current_year . "</a>";
            }else{
                echo "<a href='".$link_year."' class='year'>" . $current_year . "</a>";
            }

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
                   
                    //Month has post -> link it
                    $link = get_bloginfo('url') . "/" . $current_year . "/" . $ujung."/";

                    if ($actual_link == $link){
                         echo "<li><a class='active' href='#'>";
                         echo "<span class='archive-month'>" . $month . "</span>";
                         echo "<ul class='child'>";
                         foreach ($post as $key) {
                             echo "<li><a href='".$key['link']."'>".$key['title']."</a></li>";
                         }
                         echo "</ul></a></li>";
                    }else{
                         echo "<li><a href='".$link."'><span class='archive-month'>" . $month . "</span></a></li>";
                    }
                   
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

function getNavbarSingle(){
    global $wpdb, $wp_locale;
    $getyear;
    $post = array();
    $yearliest_year = $wpdb->get_results(
        "SELECT YEAR(post_date) AS year , MONTH(post_date) AS month
         FROM $wpdb->posts 
         WHERE post_status = 'publish' 
         AND post_type = 'post'
         ORDER BY post_date 
         DESC LIMIT 1
    ");

     if ( have_posts() ) : 
        while( have_posts() ) : the_post();
            $y = get_the_date('Y');
            $m = get_the_date('m');
            $ID = get_the_ID();
        endwhile;
    endif;

    $args = array(
        'post_type' => 'post',
        'status' => 'publish',
        'date_query' => array(
            array(
                'month' => $m,
                'year' => $y
            )
        )
    );

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $id = get_the_ID();
            $link = get_permalink($id) ;
            $title = get_the_title();
            $getyear = get_the_date('Y');
            $post[] = array("link" => $link, "title" => $title, "id" => $id); 
        }
     
    }
    wp_reset_query();

    if($yearliest_year){
        $this_year = first_post_year();
        $months = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
        $current_year = $yearliest_year[0]->year;
        while($current_year >= $this_year){
            $link_year = get_bloginfo('url') . "/" . $current_year . "/";
            echo "<ul>";

            if ($y == $current_year){
                echo "<a href='#' class='year active'>" . $current_year . "</a>";
            }else{
                echo "<a href='".$link_year."' class='year'>" . $current_year . "</a>";
            }

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
                   
                    //Month has post -> link it
                    $link = get_bloginfo('url') . "/" . $current_year . "/" . $ujung."/";
                    if ($ujung == $m && $y == $current_year){
                         echo "<li><a class='active' href='#'>";
                         echo "<span class='archive-month'>" . $month . "</span>";
                         echo "<ul class='child'>";
                         foreach ($post as $key) {
                            $status = $ID == $key['id'] ? 'active' : '';
                             echo "<li><a class='".$status."' href='".$key['link']."'>".$key['title']."</a></li>";
                         }
                         echo "</ul></a></li>";
                    }else{
                         echo "<li><a href='".$link."'><span class='archive-month'>" . $month . "</span></a></li>";
                    }
                   
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
function getMonthByYear($year){
    global $wpdb, $m, $y;
      $months = array(1 => "January", 2 => "February", 3 => "March" , 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
      $ujung = 12;
       foreach(array_reverse($months) as $month_num => $month){
        if($search_month = $wpdb->query(
                "SELECT MONTHNAME(post_date) as month 
                    FROM $wpdb->posts  
                    WHERE MONTHNAME(post_date) = '$month'
                    AND YEAR(post_date) = $year 
                    AND post_type = 'post'
                    AND post_status = 'publish'
                    order by post_date desc
                    LIMIT 1 
        ")){
           
            $link = get_bloginfo('url') . "/" . $year . "/" . $ujung."/";
            if ($ujung == $m && $y == $year){
                 echo "<a class='active' href='".$link."'>";
                 echo $month;
                 echo "</a>";
            }else{
                 echo "<a href='".$link."'>" . $month . "</a>";
            }
           
        }else{

            //Month does not have post -> just print it

            // echo "<li>
            //         <span class='archive-month'>" . $month . "</span>

            //       </li>";
        }
        $ujung--;
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

function cut($string, $your_desired_width) {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);

  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > $your_desired_width) { break; }
  }

  return implode(array_slice($parts, 0, $last_part)).'...';
}