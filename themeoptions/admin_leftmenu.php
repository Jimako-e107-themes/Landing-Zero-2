<?php
if (!defined('e107_INIT'))
{
	exit;
}

require_once("../../../class2.php");


class leftmenu_adminArea extends e_admin_dispatcher
{

	protected $modes = array(

		'custom_css'	=> array(
			'controller' 	=> 'themeoptions_ui',
			'path' 			=> null,
			'ui' 			=> 'themeoptions_form_ui',
			'uipath' 		=> null
		),
		'teammemberclass'	=> array(
			'controller' 	=> 'themeoptions_ui',
			'path' 			=> null,
			'ui' 			=> 'themeoptions_form_ui',
			'uipath' 		=> null
		),
		'master_head'	=> array(
			'controller' 	=> 'themeoptions_ui',
			'path' 			=> null,
			'ui' 			=> 'themeoptions_form_ui',
			'uipath' 		=> null
		),
		'layout'	=> array(
			'controller' 	=> 'themeoptions_ui',
			'path' 			=> null,
			'ui' 			=> 'themeoptions_form_ui',
			'uipath' 		=> null
		),
		'main'	=> array(
			'controller' 	=> 'adminconfig_ui',
			'path' 			=> null,
			'ui' 			=> 'adminconfig_form_ui',
			'uipath' 		=> null
		)

	);
	protected $adminMenu = array(
		/*	'main/prefs'			=> array('caption'=> LAN_PREFS, 'perm' => '0', 'url'=>'admin_config.php'),       */
		'custom_css/edit'	    => array('caption' => LAN_JM_THEMEOPTIONS_02, 'perm' => '0', 'url' => 'admin_custom_css.php', 'action' => 'edit'),
		'layout/edit'	    	=> array('caption' => LAN_JM_THEMEOPTIONS_06, 'perm' => '0', 'url' => 'admin_layout.php', 'action' => 'edit'),
		'master_head/edit'	    => array('caption' => LAN_JM_THEMEOPTIONS_05v, 'perm' => '0', 'url' => 'admin_master_head.php', 'action' => 'edit'),
		/*	'teammemberclass/edit'	    => array('caption'=> LAN_JM_THEMEOPTIONS_04, 'perm' => '0', 'url'=>'admin_teammembers.php', 'action' => 'edit'),	*/
		'main/main'	    => array(
			'caption' => 'Back to Theme Manager', 'perm' => '0',
			'url' => e_ADMIN . 'theme.php', 'action' => 'edit'
		),
	);

	protected $adminMenuAliases = array();

	protected $menuTitle = LAN_JM_THEMEOPTIONS;
}
