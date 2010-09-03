/**
* @file
* @brief    sigplus Image Gallery Plus initialization for Slimbox2
* @author   Levente Hunyadi
* @version  1.3.0
* @remarks  Copyright (C) 2009-2010 Levente Hunyadi
* @remarks  Licensed under GNU/GPLv3, see http://www.gnu.org/licenses/gpl-3.0.html
* @see      http://hunyadi.info.hu/projects/sigplus
*/

(function($) {
	$.fn.bindSlimbox = function () {
		// Link mapper for Slimbox.
		var linkmapper = function (el) {
			var elem = $(el);
			var image = $('img', el);
			var url = elem.attr('href');

			var summaryNode = $('#'+image.attr('id')+'_summary');
			if (summaryNode) {
				return [url, summaryNode.html()];  // unescape HTML entities
			} else if (image) {
				return [url, image.attr('title')];
			} else {
				return [url, elem.attr('title')];
			}
		}

		// Link filter for Slimbox.
		var linkfilter = function (el) {
			return (this == el) || ((this.rel.length > 'slimbox2'.length) && (this.rel == el.rel));
		}
		
		$('a[rel|="slimbox2"]').slimbox({}, linkmapper, linkfilter);
	};
})(__jQuery__ ? __jQuery__ : jQuery);