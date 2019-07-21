/**
*	Site-specific configuration settings for Highslide JS
*/
hs.graphicsDir = 'highslide/graphics/';
hs.outlineType = 'custom';
hs.captionEval = 'this.a.title';
hs.dimmingOpacity = 0;

    hs.registerOverlay({
       html: '<div class="closebutton" onclick="return hs.close(this)" title="Close"></div>',
       position: 'top right',
       fade: 2 // fading the semi-transparent overlay looks bad in IE
    });