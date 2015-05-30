<?php if ( have_posts() ) : ?>
    <span class="scroll-note">Scroll or click images.</span>
    <?php
        while ( have_posts() ){
            the_post();
            
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
        }
    ?>

<?php else : ?>

    <article id="post-0" class="post no-results not-found">
        <div class="entry-content">
            <p><?php _e( 'Looks like I don\'t have any art for you, sorry!', 'toolbox' ); ?></p>
        </div><!-- .entry-content -->
    </article><!-- #post-0 -->

<?php endif; ?>
