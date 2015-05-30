<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<meta property="og:image" content="http://catherinebyun.com/logo.png" /> 
<meta property="og:title" content="Catherine Byun" /> 
<meta property="og:type" content="website" /> 

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>

<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<!--
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.min.js" type="text/javascript">
</script>
-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.ba-hashchange.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://use.typekit.com/fuc7glp.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/site.js" type="text/javascript"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22307779-1']);
  // Don't track initial, site.js will.

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    
    setTimeout(function(){
      _gaq.push(['_trackEvent', 'General', 'SoftBounce']);
    }, 15000);
  })();

</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<div id="title">
		<div id="site-title">
		    <a href="<?php echo home_url( '/#' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/title.png" alt="<?php bloginfo( 'name' ); ?>" />
        </a>
		</div>
	</div>

	<nav id="access">
        <?php cb_menu(); ?>
        <div id="email">
            <script type="text/javascript">
                //<![CDATA[
                <!--
                var x="function f(x){var i,o=\"\",l=x.length;for(i=0;i<l;i+=2) {if(i+1<l)o+=" +
                "x.charAt(i+1);try{o+=x.charAt(i);}catch(e){}}return o;}f(\"ufcnitnof x({)av" +
                " r,i=o\\\"\\\"o,=l.xelgnhtl,o=;lhwli(e.xhcraoCedtAl(1/)3=!29{)rt{y+xx=l;=+;" +
                "lc}tahce({)}}of(r=i-l;1>i0=i;--{)+ox=c.ahAr(t)i};erutnro s.buts(r,0lo;)f}\\" +
                "\"(1),9\\\"\\\\13\\\\07\\\\03\\\\\\\\25\\\\04\\\\00\\\\\\\\16\\\\05\\\\02\\" +
                "\\\\\\6K00\\\\\\\\24\\\\0J\\\\FI\\\\nM\\\\XWzBtp~nmrtyaVpu2,aRkej(yw37\\\\0" +
                "6\\\\03\\\\\\\\27\\\\06\\\\03\\\\\\\\07\\\\06\\\\02\\\\\\\\31\\\\03\\\\03\\" +
                "\\\\\\14\\\\00\\\\01\\\\\\\\3)02\\\\\\\\04\\\\00\\\\00\\\\\\\\3C00\\\\\\\\>" +
                "`#5'<mq21\\\\0&\\\\$&-kF4^_^WVG[YHLSi@D33\\\\0p\\\\wivp1x2Mnko{b%\\\\=\\\\\\"+
                "\\T\\\\24\\\\04\\\\02\\\\\\\\23\\\\00\\\\00\\\\\\\\33\\\\02\\\\00\\\\\\\\31" +
                "\\\\0B\\\\36\\\\06\\\\00\\\\\\\\03\\\\0t\\\\\\\\\\\\27\\\\03\\\\00\\\\\\\\8" +
                "1\\\"\\\\f(;} ornture;}))++(y)^(iAtdeCoarchx.e(odrChamCro.fngriSt+=;o27=1y%" +
                "+;y+1)<9(iif){++;i<l;i=0(ior;fthnglex.l=\\\\,\\\\\\\"=\\\",o iar{vy)x,f(n i" +
                "octun\\\"f)\")"                                                              ;
                while(x=eval(x));
                //-->
                //]]>
            </script>
        </div>
	</nav><!-- #access -->

	<div id="main">
