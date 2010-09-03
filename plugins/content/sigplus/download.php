<?php
/**
* @file
* @brief    sigplus Image Gallery Plus image download helper
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

define('JPATH_BASE', dirname(dirname(dirname(dirname(__FILE__)))) );  // if download.php is in /portal/plugins/content/sigplus, JPATH_BASE will be set to /portal
define('DS', DIRECTORY_SEPARATOR);

function http_not_found($filename = false) {
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
	header('Status: 404 Not Found');
?>
<html>
<head>
<title>Image not found</title>
</head>
<body>
<h1>Image not found</h1>
<p>The requested image file <?php if ($filename !== false) { print '<kbd>'.$filename.'</kbd>'; } ?> is not available on the server.</p>
<hr/>
<p><address><a href="http://hunyadi.info.hu/projects/sigplus">sigplus Image Gallery Plus Joomla-plug-in</a><?php if (isset($_SERVER['HTTP_HOST'])) { print ' at '.$_SERVER['HTTP_HOST']; } ?></address></p>
</body>
<?php
	exit;
}

if (!isset($_GET['h']))  // check hash string
	http_not_found();

if (!isset($_SERVER['PATH_INFO']))
	http_not_found();

if (isset($_GET['a'])) {  // use Joomla authentication to check if user is logged in
	define('_JEXEC', 1);
	require_once JPATH_BASE.DS.'includes'.DS.'defines.php';
	require_once JPATH_BASE.DS.'includes'.DS.'framework.php';

	$mainframe =& JFactory::getApplication('site');
	$mainframe->initialise();

	$user =& JFactory::getUser();
	if (!$user->id)  // check if user is logged in
		http_not_found();
		
	$userdata = $user->lastvisitDate;
} else {
	$userdata = '[anonymous]';
}

$imageurl = $_SERVER['PATH_INFO'];  // contains leading slash
$filename = basename($imageurl);
$imagepath = JPATH_BASE.str_replace('/', DS, $imageurl);

if (!is_file($imagepath))  // image file not found
	http_not_found($filename);
if (substr($imagepath, 0, strlen(JPATH_BASE)) !== JPATH_BASE)  // image path is outside Joomla folder
	http_not_found($filename);

$size = @getimagesize($imagepath);
if ($size === false)
	http_not_found($filename);

$hash = md5($userdata.$imagepath.'_'.$size[0].'x'.$size[1]);
if ($hash != $_GET['h'])  // compare to computed hash
	http_not_found($filename);

header('Content-Type: '.$size['mime']);
header('Content-Length: '.filesize($imagepath));
header('Content-Disposition: attachment; filename="'.$filename.'"');
@readfile($imagepath);
exit;