<?php
/**
 * The template for the "About Me" content; split out from page so it can
 * be loaded from a gallery page.
 */

the_post();
?>

<?php
    $image = cb_get_portrait();
    $image_link = wp_get_attachment_url($image->ID);
    printf( __('<img id="about-portrait" title="Cat" src="%1$s" />'),
        $image_link);
?>

<div id="about-content">
    <?php
        get_template_part( 'content', 'page' ); 
    ?>

    <div id="contact">
        <?php echo do_shortcode('[contact-form 1 "Contact"]'); ?>
    </div>
</div>
