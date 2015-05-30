<?php

function cb_about_slug(){
    return 'about';
}

function cb_links_slug(){
    return 'links';
}

function cb_get_portrait(){
    return get_page_by_title('Cat (portrait)', OBJECT, 'attachment' );
}

/*
 * cb_menu
 * 
 * Echoes the main navigation menu.  Only echoes a dynamic menu when on the
 * home page.
 */ 
function cb_menu(){
    global $post;
    $current_page_id = $post ? $post->ID : NULL;
    
    $pages = get_pages ( array (
        'sort_column' => 'menu_order'
    ));
    
    
    $dynamic = is_home() ? 'dynamic' : '';

    printf(__('<ul class="menu %1$s">'), $dynamic);

    foreach($pages as $page){
        $current_page = $page->ID == $current_page_id ? 'current_page_item' : '';
        $target_page = cb_get_page_slug($page);
        $page_link = cb_get_page_link($page, !is_home());
        $page_title = $page->post_title;
        printf( __('<li class="page_item %1$s" data-cb-page="%2$s"><a href="%3$s" class="page_item_title">%4$s</a>'),
            $current_page,
            $target_page,
            $page_link,
            $page_title);
        
        // Just a list on the left.
        cb_thumbnails($page);
        
        printf('</li>');
    }
?>
    </ul>
<?php
}

/*
 * cb_get_post_link
 * 
 * Gets a link to the current category.  If `$root` is `TRUE` returns
 * a link of the form /#<category>, otherwise returns a link of the form
 * #<category>.
 */
function cb_get_post_link($post, $root=FALSE){
    global $post;
    
    $post_categories = wp_get_post_categories( $post->ID );
    if( $post_categories ){
        $cat = get_category($post_categories[0]);
        $page = get_page_by_title($cat->name);
        return cb_get_page_link($page, $root);
        if ($page) {
            return cb_get_page_link($page, $root);
        }
    }
    return NULL;
}

function cb_get_page_link($page, $root=FALSE){
    $root = $root ? '/' : '';
    return $root . '#' . cb_get_page_slug($page);
}

/*
 * cb_get_page_slug
 * 
 * Given a page, returns an html class for that page based on its slug.
 */ 
function cb_get_page_slug($page){
    return sanitize_html_class(strtolower($page->post_name));
};

/*
 * cb_nav
 * 
 * Echoes a navigation control for the current category.
 */
function cb_nav(){
    global $post;
    if( get_next_post(TRUE)){
        next_post_link('%link', 'Previous', TRUE);
    }
    else {
        echo '<span>Previous</span>';
    }
    
    cb_separator();
    
    $category_link = cb_get_post_link($post, TRUE);
    if($category_link){
        printf('<a href="%1$s">All</a>', $category_link);
        cb_separator();
    }
    
    if( get_previous_post(TRUE) ){
        previous_post_link('%link', 'Next', TRUE);
    }
    else {
        echo '<span>Next</span>';
    }                    
}

/*
 * cb_thumbnails
 * 
 * Prints thumbnails for the given `$page`.
 */
function cb_thumbnails($page){
    global $post;
    $page_category_name = $page->post_title;
    if(is_single()){
        // A single post page; this assumes that posts will only live in
        // *one* category!
        $categories = wp_get_post_categories($post->ID);
        if ($categories){
            $category = $categories[0];
            $current_category_name = get_category($category)->name;
        }
        else {
            return;
        }
    }    
    else if(is_front_page()){
        // The front page; the front page *must* be a category page.
        $current_category_name  = $post->post_title;
    }
    else if(is_page_template('gallery-page.php')){
        // Regular category pages.
        $current_category_name = $post->post_title;
    }
    else {
        // Some unknown (new) page, for which we know there are no thumbs.
        $current_category_name = 'unknown_category';
    }

    // Graceful-ish degredation.
    $expansion = 'expand';
    if($page_category_name != $current_category_name){
        $expansion = 'collapse collapsed';
    }

    wp_reset_query();
    $posts_array = get_posts( array ( 'category_name' => $page_category_name, 'posts_per_page' => -1 ) );
    if(!$posts_array){
        return;
    }
    
    printf('<div class="thumbnails %1$s">', $expansion);
    foreach ($posts_array as $p){
        $thumb = get_post_meta($p->ID, 'Thumbnail', true);
        $permalink = get_permalink($p->ID);

        if( $thumb ){
            printf( __( '<a href="%1$s"><img class="cb-thumbnail" src="%2$s" /></a>' ),
                $permalink,
                $thumb
            );
        }
    }
    echo '</div>';
}

/*
 * cb_separator
 * 
 * Just echoes a pipe with class "sep".
 */
function cb_separator(){
    echo '<span class="sep"> | </span>';
}

/*
 * cb_post_classes
 * 
 * Echoes the given post's classes, which are the regular ones due to 
 * `post_class` plus "article" and sometimes "sold".
 */
function cb_post_classes($p){
    $article_classes = 'article';
    $sold = get_post_meta($p->ID, 'Sold', true);
    if( $sold ){
        $article_classes .= ' sold';
    }
    post_class($article_classes);
}

/*
 * cb_get_next_link
 * 
 * Returns a link to the next image in the current category.  Must be called
 * from the loop.
 */
function cb_get_next_link(){
    global $post;
    $previous = get_previous_post(TRUE);
    if($previous){
        return get_permalink($previous->ID);
    }
    return "";
}

/*
 * cb_the_next_link
 * 
 * Echoes cb_get_next_link. 
 */
function cb_the_next_link(){
    if(is_single()){
        $next = cb_get_next_link();
        if($next){
            echo $next;
            return;
        }
    }
    the_permalink();
}

function toolbox_posted_on() {
    printf( __( '<time class="entry-date" datetime="%1$s" pubdate>%2$s</time>', 'toolbox' ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
}

?>

