<?php

if (!defined('e107_INIT'))
{
	exit;
}

$sitetheme = e107::getPref('sitetheme');

class theme_config implements e_theme_config
{
	var $sitetheme;
	var $helpLinks = array();

	public function __construct()
	{
		$this->sitetheme = e107::getPref('sitetheme');

		e107::themeLan('admin', $this->sitetheme, true);

		$this->helpLinks =
			array(
				'support' => array(
					'url' => 'https://www.e107sk.com/forum/landing-zero-2/',
					'label' => LAN_JM_ADMIN_HELP_02,
					'name' => LAN_JM_ADMIN_HELP_03,
					'icon' => '<i class="S32 e-comments-32"></i>'
				),
				'github' => array(
					'url' => 'https://github.com/Jimako-e107-themes/Landing-Zero-2-version-1.5',
					'label' => LAN_JM_ADMIN_HELP_08,
					'name' => LAN_JM_ADMIN_HELP_09,
					'icon' => '<i class="fa fa-3x fa-github"></i>'
				)
			);
	}

	public function config()
	{
		$brandingOpts = array('sitename' => LAN_LZ_THEMEPREF_09_01, 'logo' => LAN_LZ_THEMEPREF_09_02, 'sitenamelogo' => LAN_LZ_THEMEPREF_09_03);
		$parentOpts = array('' => '');

		$fields = array(
			//	'parent_theme' =>  array('title'=>"Parent theme", 'type'=>'dropdown', 'writeParms'=>array('optArray'=> $parentOpts)),
			'branding' => array('title' => LAN_LZ_THEMEPREF_09, 'type' => 'dropdown', 'writeParms' => array('optArray' => $brandingOpts)),
			'fonts_local' => array('title' => LAN_LZ_THEMEPREF_11_01, 'type' => 'boolean'),
			'fonts_subset' => array('title' => LAN_LZ_THEMEPREF_11_02, 'type' => 'boolean'),
			'extended' => array('title' => LAN_LZ_THEMEPREF_10, 'type' => 'method', 'data' => false, 'writeParms' => array('optArray' => $brandingOpts)),
		);

		return $fields;
	}

	public function help()
	{

		$themeoptions['custom_css'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/admin_" . "custom_css" . ".php";
		$themeoptions['masthead'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/masthead/admin_config.php";

		$buttons = e107::getNav()->renderAdminButton($themeoptions['custom_css'], "<b>" . LAN_JM_THEMEOPTIONS_01 . "</b><br>", LAN_JM_THEMEOPTIONS_01_HELP, "P", '<i class="S32 e-themes-32"></i>', "div");

		$buttons .= e107::getNav()->renderAdminButton($themeoptions['masthead'], "<b>" . LAN_JM_THEMEOPTIONS_05 . "</b><br>", LAN_JM_THEMEOPTIONS_05_HELP, "P", '<i class="S32 e-themes-32"></i>', "div");

		//$ns->setStyle('flexpanel');
		$mainPanel = "<div class='panel panel-default' >";


		$mainPanel .= " ";
		$mainPanel .= "<div class='panel-body'>";

		//$content = '<h2 class="text-center">' . LAN_JM_ADMIN_HELP_01 . '</h2>';
		foreach ($this->helpLinks as $helpLink)
		{
			if (!empty($helpLink['url']))
			{

				$mainPanel .= '<p class="text-center">';
				//$content .= '<a href="' . $helpLink['url'] . '" target="_blank">' . $helpLink['name'] . '</a>';
				$mainPanel .= e107::getNav()->renderAdminButton($helpLink['url'], "<b>" . $helpLink['name'] . "</b><br>", $helpLink['label'], "P", $helpLink['icon'], "div");

				$mainPanel .= '</p>';
			}
		}
		$mainPanel .= "</div> ";

		$text = '<style>a.core-mainpanel-link-icon { height: 100px; }</style>';

		$mainPanel .= $text;
		$mainPanel .= "</div>";

		return $mainPanel;
	}

	public function process()
	{
		return null;
	}
}

class theme_config_form extends e_form
{

	function extended()
	{

		$themeoptions['custom_css'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/admin_" . "custom_css" . ".php";
		$themeoptions['masthead'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/masthead/admin_config.php";

		$buttons = e107::getNav()->renderAdminButton($themeoptions['custom_css'], "<b>" . LAN_JM_THEMEOPTIONS_01 . "</b><br>", LAN_JM_THEMEOPTIONS_01_HELP, "P", '<i class="S32 e-themes-32"></i>', "div");

		$buttons .= e107::getNav()->renderAdminButton($themeoptions['masthead'], "<b>" . LAN_JM_THEMEOPTIONS_05 . "</b><br>", LAN_JM_THEMEOPTIONS_05_HELP, "P", '<i class="S32 e-themes-32"></i>', "div");

		//$ns->setStyle('flexpanel');
		$mainPanel = " <style>a.core-mainpanel-link-icon { height: 100px; }</style>";
		$mainPanel .= " ";
		$mainPanel .= $buttons;


		return $mainPanel;
	}
}
