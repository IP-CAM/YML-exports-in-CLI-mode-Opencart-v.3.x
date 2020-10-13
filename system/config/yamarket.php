<?php
// Site
$_['site_url']          = HTTP_SERVER;
$_['site_ssl']          = HTTPS_SERVER;

// Database
$_['db_autostart']      = true;
$_['db_engine']         = DB_DRIVER;
$_['db_hostname']       = DB_HOSTNAME;
$_['db_username']       = DB_USERNAME;
$_['db_password']       = DB_PASSWORD;
$_['db_database']       = DB_DATABASE;
$_['db_port']           = DB_PORT;

// Session
 $_['session_autostart'] = false; // Отключаем для CLI

// Template
 $_['template_cache']    = false; // Отключаем для CLI

// Actions
$_['action_pre_action'] = array(
	'startup/startup',
	// Отключаем для CLI
	// 'startup/error', 
	// 'startup/event',
	// 'startup/sass',
	// 'startup/login',
	// 'startup/permission'
);

// Actions
$_['action_router'] = 'cli/yamarket';

// Action Events
$_['action_event'] = array();