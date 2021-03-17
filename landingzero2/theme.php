<?php
/**
 * Bootstrap 3 Theme for e107 v2.x
 * Landing Zero Theme by www.bootstrapzero.com adapted for e107 CMS.
 * Released under the terms and conditions of the
 * GNU General Public License (http://gnu.org).
 */
 
if (!defined('e107_INIT')) { exit; }
 
////// Multilanguages/ /////////////////////////////////////////////////////////
e107::lan('theme');

class theme implements e_theme_render
{
		
        public $membersonly_enabled = false;
        
        function init() {

			////// Your own css fixes ////////////////////////////////////////////////////
			define("CORE_CSS", false);
			e107::css('theme', 'e107.css');



			////// Theme meta tags /////////////////////////////////////////////////////////
			e107::meta('viewport', 'width=device-width, initial-scale=1.0');

		
			////////////////////////////////////////////////////////////////////////////////
 
			e107::js("theme", "js/wow.js", 'jquery');
			e107::js("theme", "js/scripts.js", 'jquery');
			
			
			e107::css('url', 'https://fonts.googleapis.com/css?family=Questrial');
			e107::css('url', 'https://fonts.googleapis.com/css?family=Dancing+Script:700');

			e107::css('theme', 'css/animate.min.css');
			e107::css('theme', 'css/ionicons.min.css');
			e107::css('theme', 'css/styles.css'); 
            e107::css('theme', 'style.css'); 
            
            
			e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

			$this->getInlineCodes();

			//login page settings		
			if (e_PAGE == "login.php")
			{
				$login_iframe 	 = e107::pref('theme', 'login_iframe', false);
				$loginbox_width  = e107::pref('theme', 'loginbox_width', false);
				$loginform_width = e107::pref('theme', 'loginform_width', $loginbox_width);

				if($login_iframe) {
					define('e_IFRAME', '0');
				}
				if($loginbox_width) {
					$inlinecss = " #login-template { min-width:".$loginbox_width."   } ";
					e107::css("inline", $inlinecss);
				}
				 
				if($loginform_width) {
					$inlinecss = " #login-page { width:".$loginform_width."   } ";
					e107::css("inline", $inlinecss);
				}

			}
			//forgotten password
			if (e_PAGE == "fpw.php")
			{   
				$fpw_iframe 	 = e107::pref('theme', 'fpw_iframe', true);
 
				if($fpw_iframe) {
					//define('e_IFRAME', '0');
				}
				else {
					define('e_IFRAME', '1');
				}
				
			}

		}

		public function getInlineCodes()
		{
			$inlinecss = e107::pref('theme', 'custom_css', FALSE);
			if ($inlinecss)
			{
				e107::css("inline", $inlinecss);
			}
			$inlinejs = e107::pref('theme', 'inlinejs');
			if ($inlinejs)
			{
				e107::js("footer-inline", $inlinejs);
			}
		}

		/**
		 * @param string $text
		 * @return string without p tags added always with bbcodes
		 * note: this solves W3C validation issue and CSS style problems
		 * use this carefully, mainly for custom menus, let decision on theme developers
		 */

		function remove_ptags($text = '') // FIXME this is a bug in e107 if this is required.
		{

			$text = str_replace(array("<!-- bbcode-html-start --><p>", "</p><!-- bbcode-html-end -->"), "", $text);

			return $text;
		}
    
    
	/**
	 * @param string $caption
	 * @param string $text
	 * @param string $id : id of the current render
	 * @param array $info : current style and other menu data. 
	 */
	function tablestyle($caption, $text, $id='', $info=array()) 
	{
	//	global $style; // no longer needed. 
		
		$style = $info['setStyle'];
		
		if(e_DEBUG || e_DEVELOPER || true)  {
			 
			echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
		}

		$type = $style;
		if(empty($caption))
		{
			$type = 'box';
		}

		//use only $style for tablerender
		switch ($id)
		{
			case "wm":  // Example - If rendered from 'welcome message' 
				$style = "wm";
				$class = " class=tablestyle-".$id;
				break;				
			case "login_page":
			case "coppa":
			case "signup":
			case "fpw":
				$style = "singleform";
				$class = " class=tablestyle-".$id;
				break;
		}


		if(e_DEBUG || e_DEVELOPER || true)  {
			echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
		}
		
		
		if($style == 'wm') // Example - If rendered from 'welcome message' 
		{
			echo '<h1 class="cursive">'.$caption.'</h1><h4>'.$this->remove_ptags($text).'</h4>';
			return;
		} 

		switch ($style)
		{
		case "singleform":
			echo "<div style='display:table; height:100%; margin: 0 auto;'".$class .">
			<div style='display:table-cell; vertical-align:middle;'>";

			if (!empty($caption))
				{
				echo '<h1 class="display-5 singleform-heading">' . $caption . '</h1>';
			}
			echo '<div class="singleform-body"><div class="wrapper">' . $text . '</div></div>';
			echo '</div></div>';
			return;
		}

	
		if($style == 'col-md-4' || $style == 'col-md-6' || $style == 'col-md-8')
		{
			echo ' <div class="col-xs-12 '.$style.'">';
			
			if(!empty($caption))
			{
				echo '<h2>'.$caption.'</h2>';
			}
	
			echo '
				'.$text.'
			</div>';
			return;	
			
		}
	
		if($style === 'menu' && !empty($info['footer']) && !empty($info['text']))
		{
			$style = 'menu-footer';
		}

			
		if($style == 'menu')
		{     
			echo '<div class="panel panel-default">
				<div class="panel-heading">'.$caption.'</div>
				<div class="panel-body">
				'.$this->remove_ptags($text).'
				</div>
				</div>';
			return;
			
		}
	
		if($style == 'menu-footer')
		{
			echo '<div class="panel panel-default">
		<div class="panel-heading">'.$caption.'</div>
		<div class="panel-body">
		'.$this->remove_ptags($text).'
		</div>
		<div class="panel-footer text-align:right">'.$info['footer'].'</div>
		</div>';
			return;
	
		}
	
		if($style == 'portfolio')
		{
			echo '
			<div class="col-lg-4 col-md-4 col-sm-6">
				'.$text.'
			</div>';	
			return;
		}
	
		if($style == 'nocaption')
		{
			echo  $this->remove_ptags($text);
			return;
		}
	
		if ($style == 'footercolumn')
		{ 
			echo '<h4 class="caption">' . $caption . '</h4>' . $this->remove_ptags($text);
			return;
		}
	
		if ($style == 'footercolumn-12')
		{
			echo '<div class="col-xs-12 col-sm-3 footercolumn"> 
					<h4 class="caption">' . $caption . '</h4>' . $text . '</div>';
			return;
		}
		// default.
	
		if(!empty($caption))
		{
			echo '<h2 class="caption">'.$caption.'</h2>';
		}
	
		echo $text;
	
	
						
		return;
		
		
	}	
}
 
