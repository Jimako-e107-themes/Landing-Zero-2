<?php

// Do not use constants.. use {LAN=xxx} instead.
// Template compatible with Bootstrap 5 only.

$SIGNIN_TEMPLATE = [];


$SIGNIN_WRAPPER['signin']['SIGNIN_SIGNUP_HREF'] = '<li class="nav-item"><a class="nav-link" href="{---}">{LAN=LAN_LOGINMENU_3}</a></li>';
$SIGNIN_WRAPPER['signin']['SIGNIN_LOGIN_HREF'] = '<li class="nav-item"><a class="nav-link" href="{---}">{LAN=LAN_LOGINMENU_51}</a></li>';

$SIGNIN_TEMPLATE['signin'] = '{SIGNIN_SIGNUP_HREF}{SIGNIN_LOGIN_HREF}';

$SIGNIN_WRAPPER['signout']['SIGNIN_ADMIN_HREF'] = '<li><a class="dropdown-item signin-sc admin" id="signin-sc-admin" href="{---}"><span class="fa fa-cogs"></span> {LAN=LAN_LOGINMENU_11}</a></li>';
$SIGNIN_WRAPPER['signout']['SIGNIN_PM_NAV'] = '<li class="dropdown dropdown-pm">{---}</li>';

$SIGNIN_TEMPLATE['signout'] = '

		 
			{SIGNIN_PM_NAV}
			<li class="dropdown dropdown-avatar"><a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-toggle="dropdown">{USER_AVATAR: w=20&h=20&crop=1&shape=circle} {SIGNIN_USERNAME} <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-end">
				<li>
					<a class="dropdown-item" href="{SIGNIN_USERSETTINGS_HREF}"><span class="fa fa-cog"></span> {LAN=LAN_SETTINGS}</a>
				</li>
				<li>
					<a class="dropdown-item" role="button" href="{SIGNIN_PROFILE_HREF}"><span class="fa fa-user"></span> {LAN=LAN_LOGINMENU_13}</a>
				</li>
				<li class="divider"></li>
				{SIGNIN_ADMIN_HREF}
				<li><a class="dropdown-item" href="{SIGNIN_LOGOUT_HREF}"><span class="fa fa-power-off"></span> {LAN=LAN_LOGOUT}</a></li>
				</ul>
			</li>
	 
		
		';

