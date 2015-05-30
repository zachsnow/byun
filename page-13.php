<?php
/**
 * The template for the "About Me" page; added so that Cat can more
 * easily edit this page without mixing up the contact form and portrait.
 */

get_header(); ?>

    <div id="primary">
        <div id="content" role="main">
            <div class="cb-about">
                <?php
                    get_template_part('cb', 'about');
                ?>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
