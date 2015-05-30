<?php
/**
 * The template for the "Links" page; added so that we can easily load it on
 * the index.
 */

get_header(); ?>

    <div id="primary">
        <div id="content" role="main">
            <?php
                get_template_part('cb', 'links');
            ?>
                
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
