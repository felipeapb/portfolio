<?php

/*        ##################################
           INIT LOCALIZATION
        ################################## */

load_theme_textdomain('destyle',TEMPLATEPATH . '/lang');


/*        ##################################
           BODY ID
        ################################## */

function ds_body_id() {

        if (is_front_page())        $body_id = 'id="home"';
        if (is_home())                         $body_id = 'id="blog"';
        if (is_single())                 $body_id = 'id="single"';
        if (is_archive())                 $body_id = 'id="archive"';
        if (is_date())                         $body_id = 'id="date"';
        if (is_search())                 $body_id = 'id="search"';
        if (is_page())                         $body_id = 'id="page"';
        if (is_page_template('page-full.php')) $body_id = 'id="page-full"';
        if (is_page_template('page-archives.php')) $body_id = 'id="page-archives"';
        if (is_attachment())        $body_id = 'id="attachment-page"';
        if (is_404())                         $body_id = 'id="error404"';

        if($body_id) echo $body_id;

}


/*        ##################################
           REGISTER WIDGET - SIDEBAR
        ################################## */

if (function_exists('register_sidebar'))
        register_sidebar(array(
        'name' => 'Sidebar',
        'before_widget' => '<div id="%1$s" class="box-right">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sidebar-title">',
        'after_title' => '</h3>',
));


/*        ##################################
           CUSTOM SEARCH WIDGET
        ################################## */

function ds_search($args) {
        extract($args);
        // get widget options
        $options = get_option('search');
        $title = htmlspecialchars($options['title'], ENT_QUOTES);
        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;
        include (TEMPLATEPATH . '/searchform.php');
        echo $after_widget;
}

function ds_search_control() {

        // get widget options
        $options = get_option('search');

        // if no options set defaults
        if ( !is_array($options) ) {
                $options = array('title'=> __('Pesquisar neste site','destyle'));
    }

        if ( $_POST['search_submit'] ) {
                $options['title'] = strip_tags(stripslashes($_POST['search_title']));
                update_option('search', $options);
        }

        $title = htmlspecialchars($options['title'], ENT_QUOTES);

        echo '
                <p><label for="search_title">'.__('Titulo','destyle').':</label>
                <input class="widefat" id="search_title" name="search_title" type="text" value="'.$title.'" /></p>';

        echo '
                <input type="hidden" id="search_submit" name="search_submit" value="1" />';

}

$search_options = array('classname' => 'widget_search', 'description' => __('Widget de pesquisa do tema deStyle','destyle'));
wp_register_sidebar_widget( 'search', __('Pesquisar','decasa'), 'ds_search', $search_options);
wp_register_widget_control('search', __('Pesquisar','decasa'), 'ds_search_control');


/*        ##################################
           DESTYLE COMMENTS / PINGS
        ################################## */

function destyle_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
                <div id="comment-<?php comment_ID() ?>">
                              <div class="comment-author vcard">
                                      <p><?php echo get_avatar($comment,$size='40'); ?><?php printf(__('<span class="fn">%s</span>'), get_comment_author_link()) ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">#</a><?php edit_comment_link(__('(Editar)'),'  ','') ?></p>
                              </div>
                        <?php if ($comment->comment_approved == '0') : ?>
                        <p class="moderation"><?php _e('O seu comentário aguarda aprovação.','destyle') ?></p>
                        <?php endif; ?>
                        <?php comment_text() ?>
                        <div class="reply">
                                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </div>
                </div>
<?php

}

function destyle_pings($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php

}


/*        ##################################
           TS THEME HEADER
        ################################## */

function ts_theme_head() {

        echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>'."\n\n";
        include(TEMPLATEPATH . '/lib/superfish.php');
        if (is_single() || is_page()) wp_enqueue_script( 'comment-reply' ); ?>

<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/admin/ie.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/pngfix.js"></script>
<![endif]-->

<?php }


/*        ##################################
           CONTENT PROCEEDING MORE-LINK
        ################################## */

function after_more_content($body) {
        $moretag = '<!--more';
        $content = FALSE;
        $morePos = stripos($body, $moretag);

        if ($morePos !== FALSE || $morePos > -1) {
                $content = substr($body, $morePos + strlen($moretag));
                $morePos = stripos($content, '-->'); // reuse variable

                if ($morePos !== FALSE || $morePos > -1)
                        $content = substr($content, $morePos + 3); // strip off rest of more tag
        } else {
                // $content = $body;
        }

        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);

        echo $content;
}


/*        ##################################
           REMOVE STUFF
        ################################## */

// #more from more-link
function ts_less($content) {
        global $id;
        return str_replace('#more-'.$id.'"', '"', $content);
}
add_filter('the_content', 'ts_less');

// default css for wp-pagenavi
remove_action('wp_head', 'pagenavi_css');
remove_action('wp_print_styles', 'pagenavi_stylesheets');


/*        ##################################
           ADD ADMIN HEADER
        ################################## */

function ts_admin_header() { ?>

<style type="text/css">

.meta-field input {
    width: 98%;
}

.ts-submit {
        margin: 0 0 20px 0!important;
        padding: 0px;
}

</style>

<?php }

add_action('admin_head', 'ts_admin_header');


/*        ##################################
           OPTIONS / ADMIN / META BOX
        ################################## */

include('lib/admin/theme-options.php');
include('lib/admin/theme-admin.php');
include('lib/admin/meta-box.php');


?>