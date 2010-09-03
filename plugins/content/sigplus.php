<?php
/**
* @file
* @brief    sigplus Image Gallery Plus plug-in for Joomla
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Triggers debug mode. Debug uses uncompressed version of scripts rather than the bandwidth-saving minified versions.
define('SIGPLUS_DEBUG', false);
// Triggers logging mode. Verbose status messages are printed to the output.
define('SIGPLUS_LOGGING', false);

if (version_compare(PHP_VERSION, '5.1.0') >= 0) {
	require_once JPATH_PLUGINS.DS.'content'.DS.'sigplus'.DS.'sigplus.php';
} else {
	die('sigplus requires PHP version 5.1 or later.');
}