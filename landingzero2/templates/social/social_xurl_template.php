<?php
	/**
	 * e107 website system
	 *
	 * Copyright (C) 2008-2017 e107 Inc (e107.org)
	 * Released under the terms and conditions of the
	 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
	 *
	 */


	/**
	 * {XURL_ICONS} template
	 */
	 $SOCIAL_XURL_TEMPLATE['default']['start'] = '<p class="xurl-social-icons hidden-print">';
	 $SOCIAL_XURL_TEMPLATE['default']['item'] = '<a target="_blank" href="{XURL_ICONS_HREF}" data-tooltip-position="top" class="e-tip social-icon social-{XURL_ICONS_ID}" title="{XURL_ICONS_TITLE}"><span class="e-social-{XURL_ICONS_ID} {XURL_ICONS_CLASS}"></span></a>';
	 $SOCIAL_XURL_TEMPLATE['default']['end'] = '</p>';
        /*
                            <h4>Follow</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" href="" title="Twitter"><i class="icon-lg ion-social-twitter-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Facebook"><i class="icon-lg ion-social-facebook-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Dribble"><i class="icon-lg ion-social-dribbble-outline"></i></a></li>
                    </ul>*/
                    

   $SOCIAL_XURL_TEMPLATE['footer']['start'] = '<ul class="list-inline">';
	 $SOCIAL_XURL_TEMPLATE['footer']['item'] = '<li><a rel="nofollow" href="{XURL_ICONS_HREF}" title="{XURL_ICONS_TITLE}">
   <i class="icon-lg ion-social-{XURL_ICONS_ID}-outline"></i></a>&nbsp;</li>';
	 $SOCIAL_XURL_TEMPLATE['footer']['end'] = '</ul>';