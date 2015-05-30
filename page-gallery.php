<?php
/**
 * The template for displaying categories as a standalone page.
 *
 * Template Name: CategoryPage
 */

get_header();

// Get the category name.

?>
    <section id="primary">
        <div id="content">
            <?php
                $category = get_category_by_slug($pagename);
                
                query_posts(array(
                   'posts_per_page' => -1,
                   'cat' => $category->cat_ID 
                ));
                get_template_part('cb', 'gallery'); 
            ?>
        </div>
    </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
