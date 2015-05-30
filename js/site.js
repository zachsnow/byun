jQuery(function($){
    var SLIDE = 250;
    var THUMBNAIL_FADE = 400;
    var PAGE_FADE = 250;
    var DELAY = 50;
    
    // Shows a page based on the given page `name`. If there is no such page,
    // does nothing.
    var show = function(name){
        var $page = $('#content .cb-page.cb-' + name);
        if(!$page.length){
            // Don't switch if it is a bad hash.
            return;
        }
        
        // Change the highlight.
        var $item = $('#access .page_item[data-cb-page="' + name + '"]');
        $('#access .page_item').removeClass('current_page_item');
        $item.addClass('current_page_item');
        
        // Switch thumbnails.
        var $thumbnails = $item.find('.thumbnails');
        if(!$thumbnails.hasClass('expand')){
            $('#access .page_item .thumbnails.expand').removeClass('expand').addClass('collapse').
                slideUp(SLIDE).fadeOut(THUMBNAIL_FADE);
            $thumbnails.removeClass('collapse collapsed').addClass('expand').
                slideUp(0).slideDown(SLIDE).fadeIn(THUMBNAIL_FADE);
        }
        
        // Switch page.
        $("#content .cb-page:not(.cb-" + name + ")").fadeOut(PAGE_FADE);
        $page.delay(PAGE_FADE + DELAY).fadeIn(PAGE_FADE);
        $('.cb-initial').removeClass('cb-initial');
    };
    
    // Default page name is the first page in the list. 
    var defaultName = $($('#access .menu.dynamic .page_item').get(0)).data('cb-page');
    
    var handleHashChange = function(){
        var name = location.hash || defaultName;
        
        // No hash handling pages other than index.
        if(!name){
            return;
        }
        
        if(name[0] == '#'){
            name = name.substr(1);
        }
        show(name);
        
        // Track this as a pageview.
        _gaq.push(['_trackPageview', '/' + name]);
    };
    $(window).hashchange(handleHashChange);
    
    // Dispatch on initial hash.
    handleHashChange();
});
