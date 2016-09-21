<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/lib/superfish/superfish.css" media="screen" />

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/superfish/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/lib/superfish/supersubs.js"></script>

<script type="text/javascript">
/* <![CDATA[ */
	$(document).ready(function() { 
        $('ul.sf-menu').supersubs({
            minWidth:    12,   		// minimum width of sub-menus in em units
            maxWidth:    27,   		// maximum width of sub-menus in em units
            extraWidth:  1     		// extra width can ensure lines don't sometimes turn over
                               		// due to slight rounding differences and font-family
        }).superfish({ 
            delay:       500, 
            speed:       'fast',
            autoArrows:  false,     // disable generation of arrow mark-up
            dropShadows: false      // disable drop shadows
        }); 
    });
/* ]]> */
</script>
