<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?>
    </div><!-- #main -->

    <footer id="colophon" role="contentinfo">
        <div id="site-generator">
            &copy; 2011 Catherine Byun
            <!--
                <span class="sep">|</span>
                <a href="<?php echo get_page_link(13); ?>">about me</a>
            -->
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/jscript">
    console.info('try');
    try{jQuery.ready();}catch(e){}
</script>
</body>
</html>
