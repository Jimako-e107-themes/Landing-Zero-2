<?php

// Generated e107 Plugin Admin Area

define('e_ADMIN_AREA', true);

require_once '../../../class2.php';
if (!getperms('P'))
{
	e107::redirect('admin');
	exit;
}

$sitetheme = e107::getPref('sitetheme');

e107::themeLan('admin', $sitetheme, true);

//it is done this way because multiple prefs action
require_once "admin_leftmenu.php";

class themeoptions_adminArea extends leftmenu_adminArea
{
	public function init()
	{
		$this->defaultMode = 'master_head';
		$this->setAction = "edit";
	}
}

$code = '$(document).ready(function(){
	   $("#etrigger-submit").html("Save Settings");
	   $("h4.caption").html("' . LAN_JM_THEMEOPTIONS_05v . '");
	});';

e107::js('inline', $code);

class themeoptions_ui extends e_admin_ui
{

	protected $pluginName = 'themeoptions';
	protected $listOrder = ' DESC';

	protected $table = NULL;
	protected $fieldpref = array();
	protected $prefs = array();

	protected $fields = array(

		'pref_videobackground' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_05_01 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_05_01_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),
		'pref_hide_logo' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_05_02 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_05_02_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),
		'pref_hide_sitename' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_05_03 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_05_03_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),
		'pref_videourl' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_05_04  . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_05_04_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),

	);

	protected $afterSubmitOptions = array('edit');

	public function init()
	{
		$this->setDefaultAction('edit');

	}

	public function beforeCreate($new_data, $old_data)
	{
		$this->beforeUpdate($new_data, $old_data, NULL);
	}

	// ------- Customize Update --------

	public function beforeUpdate($new_data, $old_data, $id)
	{
		$pref = e107::getThemeConfig();
		$theme_pref = array();

		$theme_pref['videobackground'] = $new_data['videobackground'];
		$theme_pref['videomobilebackground'] = $new_data['videomobilebackground'];
		$theme_pref['videoposter'] = $new_data['videoposter'];
		$theme_pref['videourl'] = $new_data['videourl'];

		$pref->setPref($theme_pref)->save(true, true, false);

		$new_data['videobackground'] = '';
		$new_data['videomobilebackground'] = '';
		$new_data['videoposter'] = '';
		$new_data['videourl'] = '';
		return false;
	}

}

class themeoptions_form_ui extends e_admin_form_ui
{

	public function pref_videobackground($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');
		$text = '';

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'videobackground';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'image', 'data' => 'str', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

	public function pref_hide_logo($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'videomobilebackground';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'image', 'data' => 'str', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

	public function pref_hide_sitename($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'videoposter';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'image', 'data' => 'str', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

	public function pref_videourl($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'videourl';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'url', 'data' => 'str', 'writeParms' => array('size' => 'xxlarge'),);
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

}

require_once "admin_leftmenu.php";

new themeoptions_adminArea();

require_once e_ADMIN . "auth.php";
e107::getAdminUI()->runPage();
require_once e_ADMIN . "footer.php";
exit;
