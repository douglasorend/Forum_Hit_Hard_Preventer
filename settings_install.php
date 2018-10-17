<?php
$SSI_INSTALL = false;
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
{
	$SSI_INSTALL = true;
	require_once(dirname(__FILE__) . '/SSI.php');
}
elseif (!defined('SMF')) // If we are outside SMF and can't find SSI.php, then throw an error
	die('<b>Error:</b> Cannot install - please verify you put this file in the same place as SMF\'s SSI.php.');
require_once($sourcedir.'/Subs-Admin.php');

// In order to detect spiders correctly, we NEED the Search Engine support turned ON!!!
$arr = array(
	'admin_features' => '',
);
if (empty($modSettings['spider_mode']))
	$arr['spider_mode'] = 1;
if (!empty($modSettings['admin_features']))
{
	$arr['admin_features'] = explode(',', $modSettings['admin_features']);
	$arr['admin_features'] = array_diff($arr['admin_features'], array('sp'));
}
$arr['admin_features'][] = 'sp';
$arr['admin_features'] = implode(',', $arr['admin_features']);

// Set the maximum visits if it hasn't been set already:
if (!isset($modSettings['HHP_max_visits']))
	$arr['HHP_max_visits'] = 30;
updateSettings($arr);

// Echo that we are done if necessary:
if ($SSI_INSTALL)
	echo 'DB Changes should be made now...';
?>