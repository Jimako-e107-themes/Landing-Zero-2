<?php

/* you can't use theme shortcodes here, put them in plugin shortcodes */

$MASTHEAD_TEMPLATE['default']['element'] = '
<header id="first">
   <div class="header-content">
        <div class="inner">
		  {WMESSAGE=force}
        </div>
    </div>
    {MASTHEAD_INTRO}
</header>
 ';
 
 
$MASTHEAD_TEMPLATE['bigimage']['element'] = '
<header id="first"  style="background-image: url({IMAGE_BG}) ">
        <div class="header-content">
            <div class="inner">
                <h1 class="cursive wow flipInX" style="visibility: visible; animation-name: flipInX;">{MASTHEAD_HEADING}</h1>
                <h2>{MASTHEAD_SUBHEADING}</h2>
                <h3>{MASTHEAD_SUBTTITLE}</h3>
                
                <hr>
              
                <a href="{BUTTON_LINK_LEFT}" id="toggleVideo" data-toggle="collapse" class="btn btn-primary btn-xl">{BUTTON_TEXT_LEFT}</a> &nbsp; 
                <a href="{BUTTON_LINK_RIGHT}" class="btn btn-primary btn-xl page-scroll">{BUTTON_TEXT_RIGHT}</a>       
            </div>
        </div>
    </header>';


$MASTHEAD_TEMPLATE['bigimagewm']['element'] = '
<header class="masthead" style="background-image: url({IMAGE_BG}) ">
	 <div class="header-content">
        <div class="inner">
		  {MASTHEAD_INTRO}
        </div>
    </div>
</header>';
 