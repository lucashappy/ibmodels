/**
* @file
* @brief    sigplus Image Gallery Plus activation hooks for Slimbox2
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

(__jQuery__ ? __jQuery__ : jQuery)(function($) {  // shorthand for $(document).ready(function() {...})
	$("a[href$=\'jpg\']").attr("rel","lightbox");
	$("a[href$=\'gif\']").attr("rel","lightbox");
	$("a[href$=\'png\']").attr("rel","lightbox");
	$("a[rel^='lightbox']").slimbox({});
});