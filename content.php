<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

?>

<article onclick="window.location.href='<?php cb_the_next_link(); ?>';"
    id="post-<?php the_ID(); ?>"
    <?php cb_post_classes($post); ?>
    >
    
    <?php if ( is_single() ): ?>
        <!-- Only show navigation on single pages. -->
        <div class="entry-navigation">
            <?php cb_nav(); ?>
        </div> 
    <? endif; ?>
    
	<div class="entry-content">
		<?php the_content(); ?>
		
		<div class="entry-tagline">
    		<a href="<?php the_permalink(); ?>" title="<?php
                    printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) );
		        ?>" rel="bookmark">
		        <?php the_title(); ?>
	        </a>
	
	        <?php
                $caption = get_post_meta($post->ID, 'Caption', true);
		        if ( $caption ){
		                printf( ' <span class="sep"> | </span> <span class="entry-caption">%1$s</span>', $caption );
	 	        }
	        ?>
		</div><!-- .entry-header -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
