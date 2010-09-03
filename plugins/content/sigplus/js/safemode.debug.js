/*!
* @file
* @brief    sigplus Image Gallery Plus jQuery safe-mode inclusion
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

if (typeof(__jQuery__) == 'undefined') {
	if (typeof(jQuery) != 'undefined') {  // another version of jQuery has already been included
		// backup other version
		var __jQueryOther__ = jQuery.noConflict();
	}

	// load required version
	google.load('jquery', '1.4.2', {uncompressed:true});  // .js file will be loaded after this script terminates
}