<?php
/**********************************************************************************
* Subs-HardHit.php                                                                *
***********************************************************************************
* This mod is licensed under the 2-clause BSD License, which can be found here:   *
*	http://opensource.org/licenses/BSD-2-Clause                                   *
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but	  *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY	  *
* or FITNESS FOR A PARTICULAR PURPOSE.											  *
**********************************************************************************/
if (!defined('SMF'))
	die('Hacking attempt...');

/**********************************************************************************
* Function that detects number of visits made under a particular session:         *
**********************************************************************************/
function HHP_checkVisits()
{
	global $modSettings, $boarddir, $user_info, $context;

	// Exclude admin, moderators and when action parameter is specified in URL:
	if ($user_info['is_admin'] || $user_info['is_mod'] || isset($_GET['action']) || $user_info['possibly_robot'])
		return;

	// Make sure to get rid of all visits that have occurred more than a minute ago:
	$time_limit = time() - 60;
	if (isset($_SESSION['HHP_Visits']))
	{
		foreach ($_SESSION['HHP_Visits'] as $time => $url)
		{
			if ($time < $time_limit)
				unset($_SESSION['HHP_Visits'][$time]);
		}
	}

	// Log the current visit's URL into the "HHP_Visits" session array:
	$_SESSION['HHP_Visits'][$context['HHP_time'] = time()] = $_SERVER['REQUEST_URI'];

	// Decide on the maximum number of visits before ban.  Minimum of 30 visits permitted.
	$max_visits = (!empty($modSettings['HHP_max_visits']) ? max($modSettings['HHP_max_visits'], 30) : 30);

	// If the maximum number of hits per minute has been exceeded, automatically ban them via .htaccess!!!!
	if (empty($modSettings['HHP_enabled']) || count($_SESSION['HHP_Visits']) < $max_visits)
		return;
		
	// Read and modify the .htaccess file:
	$htaccess = @file_get_contents($boarddir . '/.htaccess');
	$order = 'order deny,allow';
	if (!$htaccess || strpos($htaccess, $order) === false)
		$htaccess .= "\n" . $order . "\ndeny from env=deniedip";
	$time = date('Y-m-d', time());
	$ip = $_SERVER['REMOTE_ADDR'];
	if (HHP_cloudflare_check())
		$rep = 'SetEnvIf X-FORWARDED-FOR ' . $ip . ' # ' . $time . "\n" . $order;
	else
		$rep = $order . "\ndeny from " . $ip . ' # ' . $time;

	// Write the modified .htaccess file:
	$file = @fopen($boarddir . '/.htaccess', 'w');
	@fwrite($file, str_replace($order, $rep, $htaccess));
	@fclose($file);

	// Kick this guy out of our forum!!!
	loadLanguage('Errors');
	fatal_lang_error('automatic_ban', 'user', array($ip, $max_visits));
}

/**********************************************************************************
* Helper function to detect whether CloudFlare servers are used to hide an IP     *
*   Original code: http://custom.simplemachines.org/mods/index.php?mod=4072       *
**********************************************************************************/
function HHP_cloudflare_check()
{
	if (!isset($_SERVER['HTTP_CF_CONNECTING_IP']))
		return false;
	$cloudflare_ips = array(
		array('ip' => '103.21.244.0', 	'range' => 22),
		array('ip' => '103.22.200.0', 	'range' => 22),
		array('ip' => '103.31.4.0', 	'range' => 22),
		array('ip' => '104.16.0.0', 	'range' => 12),
		array('ip' => '108.162.192.0', 	'range' => 18),
		array('ip' => '141.101.64.0', 	'range' => 18),
		array('ip' => '162.158.0.0', 	'range' => 15),
		array('ip' => '172.64.0.0', 	'range' => 13),
		array('ip' => '173.245.48.0', 	'range' => 20),
		array('ip' => '188.114.96.0', 	'range' => 20),
		array('ip' => '190.93.240.0', 	'range' => 20),
		array('ip' => '197.234.240.0', 	'range' => 22),
		array('ip' => '198.41.128.0', 	'range' => 17),
		array('ip' => '199.27.128.0',	'range' => 21),
	);
	$ip = sprintf('%032b', ip2long($_SERVER['REMOTE_ADDR']));
	foreach ($cloudflare_ips as $arr)
	{
		$net = sprintf('%032b', ip2long($arr['ip']));
		if (substr_compare($ip, $net, 0, $arr['range']) === 0);
		{
			$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
			return true;
		}
	}
	if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR'])
	{
		$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
		return true;
	}
	return false;
}

?>