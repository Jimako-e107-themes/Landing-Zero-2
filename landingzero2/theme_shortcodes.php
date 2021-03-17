<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/


class theme_shortcodes extends e_shortcode
{
	var $override = true;
  	var $file_extension = '.html';
	var $sitetheme = '';
	var $layoutsOptions= array();

	var $themePrefs = array();

	function init()
	{
        //core pref
        $this->sitetheme = e107::getPref('sitetheme');
        
        //theme prefs
        $this->themePrefs = e107::pref('theme');
        $this->themePrefs['masthead'] =  e107::pref('masthead');
        
        if (e107::isInstalled('jmlayouts')) {
            $tmp = e107::getDb()->retrieve('jmlayout', '*', null, true);
            foreach ($tmp as $layout) {
                $mode = $layout['layout_mode'] ;
                $this->layoutsOptions[$mode] =   $layout;
            }
        }
    }
 
        /* Master Header with back compability */
      	/* {THEME_MASTERHEAD} */
      	function sc_theme_masterhead($parm = NULL)
      	{
      		$masterhead = varset($this->themePrefs['masthead']['wm_default'], '0');
  
      		if(!e107::isInstalled('masthead') ) { $masterhead = '0'; }
 
      		/* it is not installed, original hardcoded solution */
      		if($masterhead == '0' ) { 
		      	$text = '    <header id="first">
                      	     <div class="header-content">
                                  <div class="inner">
                      				  {WMESSAGE=force}
                                  </div>
                              </div>
                             {VIDEOBACKGROUND}
                          </header>
					';
      			$wmessage = e107::getParser()->parseTemplate($text); 
      			return $wmessage;
      		}
      		else {
      				$text = '{MASTHEAD: mode='.$masterhead.'}'; 
      				 
      				$wmessage = e107::getParser()->parseTemplate($text); 
      		
      				return $wmessage;
      		}
      	}

		function sc_header($parm)
		{

            $theme = e107::getPref('sitetheme');
			$headerName = varset($layout_options['layout_header'], $theme."/headers/header_default.html");  
            $headerpath = e_THEME. $headerName;   
  
			if(file_exists($headerpath)) {
				$text = file_get_contents($headerpath);
			} 
			return $text;
		}		
 
		function sc_footer($parm)
		{
			$theme = e107::getPref('sitetheme');    
			$footerName = varset($layout_options['layout_footer'], $theme."/footers/footer_default.html");  
			$footerpath = e_THEME. $footerName ; 
 
            if(file_exists($footerpath)) {
			$text = file_get_contents($footerpath);     
			} 
			return $text;
		}
		
		/* {NAVBAR_BRANDING} */
		public function sc_navbar_branding()
		{ 
	
			$pref = e107::pref('theme', 'branding');
			switch ($pref)
			{
			case 'logo':
				$brand = '{SITELOGO: h=70}';
				break;
			case 'sitenamelogo':
				$brand = "{SITELOGO: h=50}&nbsp;" . SITENAME;
				break;
			case 'sitename':
			default:
				$brand = '<i class="ion-ios-analytics-outline"></i>&nbsp;'.SITENAME;
				break;
			}
			$text = '<a class="navbar-brand page-scroll" href="{SITEURL}#first">'. $brand .'</a>';


			$text = e107::getParser()->parseTemplate($text);
			return $text;
		}
  
  
		function sc_aboutmodal()
		{
			$text =  e107::getParser()->parseTemplate('{CMENU=aboutmodal}');
			return $text; 
		}

		function sc_videobackground($parm=null)
		{
                                     
			if($this->isMobile() ) //|| !empty($_GET['configure'])
			{
    			/* first frame */ 
    			if($videoposter = e107::pref('theme', 'videomobilebackground', false))
    			{
    				$videoposter = e107::getParser()->thumbURL($videoposter, array("w"=>0,"h"=>0), false, true);
    			}
    			elseif($videoposter = e107::pref('theme', 'videoposter', false))
    			{
    				$videoposter = e107::getParser()->thumbURL($videoposter, array("w"=>0,"h"=>0), false, true);
    			}
    			else
    			{
    				$videoposter = SITEURLBASE.THEME_ABS."images/background01.jpg";
    			}
    
    			if($parm == 'file')
    			{
    				return $videoposter;
    			}
			}
							
			/* first frame */ 
			if($videoposter = e107::pref('theme', 'videoposter', false))
			{
				$videoposter = e107::getParser()->thumbURL($videoposter, array("w"=>0,"h"=>0), false, true);
			}
			else
			{
				$videoposter = SITEURLBASE.THEME_ABS."images/background01.jpg";
			}

			if($parm == 'file')
			{
				return $videoposter;
			}


			
			/* mp4 video url */

			if(!$videourl = e107::pref('theme', 'videourl', false))
			{
				$videourl = "https://storage.googleapis.com/coverr-main/mp4/Traffic-blurred2.mp4";
			}
			else 
			{
				$videourl = e107::getParser()->replaceConstants($videourl, 'full', true);
			}

			$text = '
			<video autoplay="" loop="" class="fillWidth fadeIn wow collapse in" data-wow-delay="0.5s" poster="'.$videoposter.'" id="video-background">
				<source src="'.$videourl.'" type="video/mp4">'.LAN_LZ_THEME_03.'
			</video>';
			
			return $text;
		}


		function isMobile()
		{
		
			return preg_match("/\b(?:a(?:ndroid|vantgo)|b(?:lackberry|olt|o?ost)|cricket|do‌​como|hiptop|i(?:emob‌​ile|p[ao]d)|kitkat|m‌​(?:ini|obi)|palm|(?:‌​i|smart|windows )phone|symbian|up\.(?:browser|link)|tablet(?: browser| pc)|(?:hp-|rim |sony )tablet|w(?:ebos|indows ce|os))/i", $_SERVER["HTTP_USER_AGENT"]);
		}

		function sc_landing_toggle()
		{
			if($this->isMobile() || (e_ADMIN_AREA === true))
			{
				return null;
			}


			return '<hr><a href="#video-background" id="toggleVideo" data-toggle="collapse" class="btn btn-primary btn-xl">'.LAN_LZ_THEME_02.'</a>
									&nbsp; ';
		}
 

		function sc_cmenutext()
		{
			$sc   = e107::getScBatch('page', null, 'cpage');
			$data = $sc->getVars();
			return vartrue($data['menu_button_text'],'');
		}
 

		function sc_sitedisclaimer($copyYear = NULL)
		{
			$default = "Proudly powered by <a href='http://e107.org'>e107</a> which is released under the terms of the GNU GPL License.";
			$sitedisclaimer = deftrue('SITEDISCLAIMER',$default);
	
			$copyYear = vartrue($copyYear,'2013');
			$curYear = date('Y'); 
			$text = '&copy; '. $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');
	
			$text .= ' '.$sitedisclaimer;        
				return e107::getParser()->toHTML($text, true, 'SUMMARY');	
		}

 

		function sc_lz_subscribe()
		{
			$pref = e107::pref('core');
			$ns = e107::getRender();

			if(empty($pref['signup_option_class']))
			{
				return false;
			}

			$frm = e107::getForm();
			$text = $frm->open('lz-subscribe','post', e_SIGNUP);
			$text .= "<div class='form-group'>";
			$text .= $frm->text('email','', null, array('placeholder'=>LAN_LZ_THEME_15, 'size'=>'xxlarge'));
			$text .= "</div>";
			$text .= "<div class='form-group'>";
			$text .= " ".$frm->button('subscribe', 1, 'submit', LAN_LZ_THEME_16, array('class'=>'btn-primary'));
			$text .= "</div>";
			$text .= $frm->close();

			$caption = LAN_LZ_THEME_17;

			return $ns->tablerender($caption,$text,'lz-subscribe', true);
		}
 

	function sc_contact_submit_button($parm='')
	{
		return "<input type='submit' name='send-contactus' value=\"".LANCONTACT_08."\" class='btn btn-primary btn-block btn-lg' />";	
	}
 
 
  	/* {THEME_PREF: code=header_width&default=container} */
    /* way how to use theme prefs as shortcodes in HTML layout */
	function sc_theme_pref($parm) 
	{   
 
		$name = $parm['name'];
		if(!isset($name)) 
		{
		return "";
		}
		$default = $parm['default'];
 
		$value = $this->themePrefs[$name];
 
		$value = varset($value, $default);
 
		return $value; 
  
 	}
	
	
	
}



 