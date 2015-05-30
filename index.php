<?php
/**
 * The index page.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CatherineByun
 * @since CatherineByun 0.0
 */

get_header();

// Build the home page from scratch.
wp_reset_query();

?>
    <div id="primary">
    	<div id="content" role="main">
    	    <!-- Load the main contents of each page, in turn. -->
    	    <?php
                // Category galleries.
                $categories = get_categories();
                $first = 'cb-initial';
                foreach($categories as $category){
                    printf(__('<div class="cb-page cb-%1$s %2$s">'), $category->slug, $first);
                    $first = '';
                    query_posts(array(
                        'posts_per_page' => -1,
                        'cat' => $category->cat_ID 
                    ));
                    get_template_part('cb', 'gallery');
                    echo '</div>';
                    
                    wp_reset_query();
                }
        	    
                // Links 
        	echo '<div class="cb-page cb-links">';
                query_posts(array('pagename' => cb_links_slug(), 'post_type' => 'page'));
                get_template_part('cb', 'links');
                wp_reset_query();
                echo '</div>';
                
                // About
                echo '<div class="cb-page cb-about">';
                query_posts(array('pagename' => cb_about_slug(), 'post_type' => 'page'));
                get_template_part('cb', 'about');
                wp_reset_query();
                echo '</div>';
            ?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
